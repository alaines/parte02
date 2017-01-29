<?php
class Datos {
    
    private function data(){
        $data = file_get_contents("../data/employees.json");
        $employees = json_decode($data, true);
        return $employees;
    }
   
    function listadoAll() {
        $listado = $this->data();
        return $listado;
    }
    
    function detail($id){
        $listado = $this->data();
        $i = 0;
        foreach ($listado as $l){
            if($l['id'] == $id){
                $employee[] = $listado[$i];
            };
            ++$i;
        }
        return $employee;
    }
    
    function search($email){
        $listado = $this->data();
        $i = 0;
        foreach ($listado as $l){
            if($l['email'] == $email){
                $employees[] = $listado[$i];
            };
            ++$i;
        }
        return $employees;
    }
    
    function searchSalary($first, $second){        
        $listado = $this->data();
        $i = 0;
        foreach ($listado as $l){
            $l1 = str_replace('$', '', $l['salary']);
            $l2 = str_replace(',', '', $l1);
            if($l2 >= $first && $l2 <= $second){
                $employees[] = $listado[$i];
            };
            ++$i;
        }
        return $employees;
    }
    
    function array2XML($data, $rootNodeName = 'data', $xml=NULL){
        if ($xml == null){
            $xml = simplexml_load_string("<?xml version='1.0' encoding='utf-8'?><$rootNodeName />");
        }

        foreach($data as $key => $value){
            if (is_numeric($key)){
                $key = "employee_". (string) $key;
            }

            if (is_array($value)){
                $node = $xml->addChild($key);
                $o = new Datos();
                $o->array2XML($value, $rootNodeName, $node);
            } else {
                $value = htmlentities($value);
                $xml->addChild($key, $value);
            }

        }

        return html_entity_decode($xml->asXML());
    }
    
}


