
<?php

/*
* Template Class
* Creates a template/view object
*/

class Template
    {

    //Path to template
    protected $template;

    //Variables passed in
    protected $vars = array();


    /*
     * Class Constructor
     */
    public function __construct($template)
    {
        $this->template = $template;
    }


    /*
     * Get Template variables - Utilized for reading data from inaccessible properties
     */
    public function __get($key)
    {
        return $this->vars[$key];
    }


    /*
     * Set Template variables - It's going to be run when we write data to inaccessible properties
     */
    public function __set($key, $value)
    {
        $this->vars[$key] = $value;
    }


    /*
     * Convert Object to String
     */
    public function __toString() //Let us treat an object as a string and we can echo ou template
    {
        extract($this->vars); //Get our template variables
        chdir(dirname($this->template));
        ob_start(); //Turn on output buffering

        include basename($this->template);

        return ob_get_clean();
    }


    }