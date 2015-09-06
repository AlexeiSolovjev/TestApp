<?php
class UsersModel
{

    /**
     * конструктор класса-здесь - создается соединение с базой
     */
    public function __construct()
    {
        $this->db = new mysqli('localhost', 'root', '68563385', 'user_registration');
        if (mysqli_connect_errno()) {
            printf("Не удалось подключиться: %s\n", mysqli_connect_error());
            exit();
        }
    }

    /**
     * сохраняем данные записи
     * @param $data
     */
    public function save($data)
    {
        foreach ($data as $key => $value) {
            $data[$key] = $this->db->real_escape_string($value);
        }
        $stmt = $this->db->prepare("INSERT INTO users (name, surname, password, email,  profile_image) VALUES (?, ?, ?, ?, ?);");
        $stmt->bind_param('sssss', $data['exampleInputName'], $data['exampleInputSurname'], md5($data['exampleInputPassword1']), $data['exampleInputEmail1'], end(explode('/user_registration', $data['profile_image'])));
        $stmt->execute();
        $stmt->close();
        addNotification($this->db->error, 'success');
    }

    /**проверка данных пользователя
     * @param $data
     * @return array|bool
     */
    public function checUserExist($data)
    {
        $stmt = $this->db->prepare("SELECT name, surname, email,profile_image FROM users WHERE password=? AND email=? ");
        $stmt->bind_param('ss', md5($data['exampleInputPassword1']), $data['exampleInputEmail1']);
        $result = $stmt->execute();

        $stmt->bind_result($name, $surname, $email, $image);
        while($stmt->fetch()) {
            $result = array(
                'name' => $name,
                'surname' => $surname,
                'email' => $email,
                'image' => $image
            );
        }
        $stmt->close();
        if (is_array($result)) {
            return $result;
        } else {
            return false;
        }
    }
}

