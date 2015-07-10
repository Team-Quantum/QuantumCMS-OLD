<?php

namespace Quantum;

use Closure;

class ExceptionHandler {

    /**
     * @var \Exception
     */
    private $exception;

    protected $exceptions = [];
    /**
     * @var Core
     */
    private $core;

    /**
     * ExceptionHandler constructor.
     * @param Core $core
     */
    public function __construct(Core $core)
    {
        $this->core = $core;
        set_exception_handler(array($this, 'handleException'));
    }

    /**
     * @param $type
     * @param callable $closure
     */
    public function pushError($type, Closure $closure)
    {
        $this->exceptions = array_merge([$type => $closure], $this->exceptions);
    }

    public function handleException(\Exception $exception)
    {
        $this->exception = $exception;

        foreach ($this->exceptions as $e => $closure) {
            if ($exception instanceof $e) {
                $closure($this->core);
                return;
            }
        }

        $code = '
                <html>
                        <head>
                                <style>
                                        pre {margin: 0;font-size: 11px;color: #515151;background-color: #D0D0D0;padding-left: 30px;}
                                        pre b { display: block; padding-top: 10px; padding-bottom: 10px; }
                                        .backtrace {border: 1px solid black; margin: 1px;}
                                        .file { font-size: 11px; color: green; background-color: white;}
                                        .header { color: rgb(105, 165, 80); background-color: rgb(65, 65, 65); padding: 4px 2px; }
                                        .step { color: white; }
                                        .tracecode  { color: rgb(105, 165, 80); }
                                </style>
                        </head>
                        <body>' .
            $this->createBackTraceCode($exception->getTrace()) . '
                        </body>
                </html>
                ';
        echo $code;
    }

    public function createBackTraceCode(array $trace)
    {
        $backtracecode = '';
        $backtracecontainer = '<div class="backtrace">%s</div>';
        $stepheadercode = '<pre class="header"><span class="step">%s</span> <span class="class">%s</span></pre>';
        $mainheadercode = '<pre class="header"><span class="code">Code: %s</span> <span class="error">Message: %s</span></pre>';
        $current = sprintf($mainheadercode, $this->exception->getCode(), $this->exception->getMessage());
        $current .= $this->getCodeSnippet($this->exception->getFile(), $this->exception->getLine());
        $backtracecode .= sprintf($backtracecontainer, $current);
        if (count($trace)) {
            //Verschiedene Trace stufen durchloopen
            foreach ($trace as $index => $step) {
                ($step['class']) ? $class = $step['class'] . '::' . $step['function'] : $class = $step['function'];
                //if(Core::getInstance() == null || !Core::getInstance()->isDebug()) {
                //    $class .= '(***censored***)';
                //} else {
                    $class .= '(';
                    $arguments = '';
                    foreach ((array)$step['args'] as $argument) {
                        $arguments .= ((strlen($arguments)) === 0) ? '' : ', ';
                        if (is_object($argument)) {
                            $arguments .= get_class($argument);
                        } elseif (is_string($argument)) {
                            $arguments .= $argument;
                        } elseif (is_numeric($argument)) {
                            $arguments .= (string) $argument;
                        } else {
                            $arguments .= gettype($argument);
                        }
                    }
                    $class .= $arguments;
                    $class .= ')';
                //}
                $stepcode = sprintf($stepheadercode, count($trace) - $index, $class);
                $stepcode .= $this->getCodeSnippet($step['file'], $step['line']);
                $backtracecode .= sprintf($backtracecontainer, $stepcode);
            }
        }
        return $backtracecode;
    }

    public function getCodeSnippet($filePathAndName, $lineNumber) {
        //if(Core::getInstance() == null || !Core::getInstance()->isDebug()) {
        //    return "<span class='file'><b>File:</b> " . $filePathAndName . " <b>Line:</b> " . $lineNumber . "</span><pre><b>Sourcecode only available in debug mode.</b></pre>";
        //
        //}
        $codeSnippet = '';
        $pathPosition = strpos($filePathAndName, 'Packages/');
        if (@file_exists($filePathAndName)) {
            $phpFile = @file($filePathAndName);
            if (is_array($phpFile)) {
                $startLine = ($lineNumber > 2) ? ($lineNumber - 2) : 1;
                $endLine = ($lineNumber < (count($phpFile) - 2)) ? ($lineNumber + 3) : count($phpFile) + 1;
                if ($endLine > $startLine) {
                    if ($pathPosition !== FALSE) {
                        $codeSnippet = '<span class="file">' . substr($filePathAndName, $pathPosition) . ':</span><br /><pre>';
                    } else {
                        $codeSnippet = '<span class="file">' . $filePathAndName . ':</span><br /><pre>';
                    }
                    for ($line = $startLine; $line < $endLine; $line++) {
                        $codeLine = str_replace("\t", ' ', $phpFile[$line - 1]);
                        if ($line === $lineNumber) {
                            $codeSnippet .= '</pre><pre class="tracecode">';
                        }
                        $codeSnippet .= sprintf('%05d', $line) . ': ' . $codeLine;
                        if ($line === $lineNumber) {
                            $codeSnippet .= '</pre><pre>';
                        }
                    }
                    $codeSnippet .= '</pre>';
                }
            }
        }
        return $codeSnippet;
    }
}