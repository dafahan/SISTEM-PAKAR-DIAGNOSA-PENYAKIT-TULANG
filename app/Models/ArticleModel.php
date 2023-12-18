<?php

namespace App\Models;

use CodeIgniter\Model;

class ArticleModel extends Model
{
    private $jsonFile;

    public function __construct()
    {
        // Specify the path to your JSON file
        $this->jsonFile = FCPATH . 'files/response.json'; // Adjust the path based on your project structure
    }

    private function readData()
    {
        $jsonData = json_decode(file_get_contents($this->jsonFile), true);
        return $jsonData;
    }

    private function saveData($data)
    {
        file_put_contents($this->jsonFile, json_encode($data, JSON_PRETTY_PRINT));
    }

    public function createItem($item)
{
    
    $jsonData = $this->readData();

    $newItem = [
       'description' => $item['description'],
        'hasPart' => [
            [
                '@type' => 'WebPageElement',
                'headline' => '',
                'text' => $item['text'],
            ],
        ],
        'headline' => $item['headline'],
       
    ];

  
    $jsonData['hasPart'][] = $newItem;

    $this->saveData($jsonData);

    return $newItem;
}


    public function readAllItems()
    {
        $jsonData = $this->readData();
        return $jsonData['hasPart'];
    }

    public function readItem($id)
    {
        $jsonData = $this->readData();
        foreach ($jsonData['hasPart'] as $item) {
            if ($item['id'] == $id) {
                return $item;
            }
        }
        return null;
    }

    public function updateItem($index, $item)
{
   
    $jsonData = $this->readData();
    $newItem = [
        'description' => $item['description'],
         'hasPart' => [
             [
                 '@type' => 'WebPageElement',
                 'headline' => '',
                 'text' => $item['text'],
             ],
         ],
         'headline' => $item['headline'],
        
     ];
    // Check if the index is valid
    if (isset($jsonData['hasPart'][$index-1])) {
        
        $jsonData['hasPart'][$index-1] = array_merge($jsonData['hasPart'][$index-1], $newItem);
        
        $this->saveData($jsonData);
        return $jsonData['hasPart'][$index-1];
    }

    return null;
}


    public function deleteItem($index)
    {
        $jsonData = $this->readData();
        
        // Check if the index is valid
        if (isset($jsonData['hasPart'][$index-1])) {
            $deletedItem = array_splice($jsonData['hasPart'], $index-1, 1)[0];
            $this->saveData($jsonData);
            return $deletedItem;
        }

        return null;
    }


    public function fetchData(){
            $filePath = FCPATH . 'files/response.json'; // Adjust the path based on your project structure

        if (file_exists($filePath)) {
            $jsonContent = file_get_contents($filePath);

            if ($jsonContent === false) {
                echo 'Error reading JSON file';
                // Log the error or handle it in an appropriate way for your application
            } else {
                $data = json_decode($jsonContent, true);

                if (json_last_error() !== JSON_ERROR_NONE) {
                    echo 'Error parsing JSON';
                    // Log the error or handle it in an appropriate way for your application
                } else {
                    return $data;
                }
            }
        } else {
            echo 'JSON file not found';
            // Log the error or handle it in an appropriate way for your application
        }
    }
}