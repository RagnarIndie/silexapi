<?php
namespace Sample\Model;


class BaseModel
{
    protected $db = null;
    protected $fields = [
        'required' => []
    ];

    public function __construct($db)
    {
        $this->db = $db;
        return $this;
    }

    public function validate(array $data)
    {
        $isValid = true;

        foreach ($this->fields['required'] as $field) {
            if (!isset($data[$field]) || empty($data[$field])) {
                $isValid = false;
            }
        }

        return $isValid;
    }

    public function generateRandom($length = 8)
    {
        return substr(md5($this->getRandomString()), 0, $length);
    }

    protected function getRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }
}