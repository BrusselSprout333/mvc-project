<?php

class ViewClass
{
    private string $templatesPath;

    public function __construct($templatesPath)
    {
        $this->templatesPath = $templatesPath;
    }

    public function render(string $name, array $params = []): void
    {
        if($params)
            foreach ($params as $param)
            {
                extract($param);
                ob_start();
                require $this->templatesPath . '/' . $name . '.php';
                $output = ob_get_clean();
                echo $output;
            }
        else //если нет параметров
        {
            ob_start();
            require $this->templatesPath . '/' . $name . '.php';
            $output = ob_get_clean();
            echo $output;
        }
    }
}