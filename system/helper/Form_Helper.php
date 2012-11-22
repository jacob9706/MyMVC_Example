<?php

class Form_Helper{

// Develop Forms Faster.

    var $formId;



    function formBuilder(){



    }



    function input($label,$name,$value='',$params=''){

        if ($value != '') {

            $value="value=\"$value\"";

        }

        if (is_array($params)){

            $parameters="";

            foreach ($params as $k=>$v){

                $parameters.=" $k=\"$v\"";

            }

        } else {
            $parameters = $params;
        }

        return "<label for=\"$name\">$label</label> <input type=\"text\" name=\"$name\" $value $parameters /> <br/> \n";

    }



    function textarea($label,$name,$value='',$params=''){



        if (is_array($params)){

            $parameters="";

            foreach ($params as $k=>$v){

                $parameters.=" $k=\"$v\"";

            }

        }

        return "<label for=\"$name\">$label</label> <textarea name=\"$name\" $parameters >$value</textarea><br/> \n";

    }





    function select($label,$name,$value='',$params=''){



        if (is_array($params)){

            $parameters="";

            foreach ($params as $k=>$v){

                $parameters.=" $k=\"$v\"";

            }

        }







        if (is_array($value)){

            $values="";

            foreach ($value as $k=>$v){

                $values.="\n \t<option value=\"$v\">$v</option>";

            }

        }

        return "<label for=\"$name\">$label</label><select name=\"$name\" $parameters >$values\n</select> <br/> \n";

    }



    function hidden($name,$value='',$params=''){

        if ($value != '') {

            $value="value=\"$value\"";

        }

        if (is_array($params)){

            $parameters="";

            foreach ($params as $k=>$v){

                $parameters.=" $k=\"$v\"";

            }

        }

        return "<input type=\"hidden\" name=\"$name\" $value $parameters />";

    }



    function open($action,$method,$id){

        $this->formId=$id;

        return "<form action=\"$action\" method=\"$method\" id=\"$id\"><br style=\"clear:both;\" />";

    }



    function submit($value,$name=''){

        if ($name != ''){

            $name="name=\"$name\"";

        }

        return "<input type=\"submit\" $name value=\"$value\" class=\"submitButton\" />";

    }



    function style(){

        echo '

        <style>

#';

        echo $this->formId;

        echo ' label{

            display:block;

            width:150px;

            text-align:right;

            clear:left;

            float:left;

            font-size:11px;

        }



#';

        echo $this->formId;

        echo ' input,#' . $this->formId . ' textarea,#' . $this->formId . ' select {

            float:left;

            clear:right;

            margin-left:5px;

        }

#' . $this->formId . ' input.submitButton{

        float:none;

        clear:both;

        margin-top:20px;



    }



    </style>

    ';

}



}