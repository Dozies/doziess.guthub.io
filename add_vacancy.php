<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare("INSERT INTO vacancies (title, description, salary, location, contact_name, contact_phone, contact_email) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([
        $_POST['title'],
        $_POST['description'],
        $_POST['salary'],
        $_POST['location'],
        $_POST['contact_name'],
        $_POST['contact_phone'],
        $_POST['contact_email']
    ]);
    
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавить вакансию</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 0 auto; padding: 20px;     align-items: center;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url(bg.jpg);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100%;
            font-family: Arial, Helvetica, sans-serif;
            max-width: 1000px; 
            margin: 0 auto;
            padding: 20px; }
            .form-group { margin-bottom: 15px; }
            label { color: #31BCE8; display: block; margin-bottom: 5px; }
            input, textarea { width: 100%; padding: 8px; box-sizing: border-box; }
            textarea { height: 150px; }
            .ok { margin-top: 10px; height: 50px; background: #31BCE8; color: white; padding: 10px 15px; border: none; cursor: pointer; border-radius: 30px}
            justify-content: center;
        

        header {
   
            padding: 10px;
            text-align: right;
        }

        h1{
            color: #31BCE8;
        }
        h3{
            color: #31BCE8;
        }

        header button {
        
            margin: auto;
            display: flex;
            justify-content: center;
            align-items: center;
            background: none;
            border: none;
            cursor: pointer;
        }

        header button img {
        
            width: 500px;
            height: 120px;
        }
        
    </style>
</head>
<body>
    <header>
            <a href="index.php">
                <button id="HomeButton" >
                    <img src="wks.png" alt="Главная"> 
                </button>
            </a>
    </header>
        <div class="all">
                <h1>Добавить вакансию</h1>
            <form method="POST">
                <div class="form-group">
                    <label>Название вакансии:</label>
                    <input type="text" name="title" required>
                </div>
                
                <div class="form-group">
                    <label>Описание:</label>
                    <textarea name="description" required, maxlenght="200"></textarea>
                </div>
                
                <div class="form-group">
                    <label>Зарплата:</label>
                    <input type="text" name="salary" required>
                </div>
                
                <div class="form-group">
                    <label>Место работы (город/адрес):</label>
                    <input type="text" name="location" required>
                </div>
                
                <h3>Контактные данные</h3>
                <div class="form-group">
                    <label>Контактное лицо:</label>
                    <input type="text" name="contact_name" required>
                </div>
                
                <div class="form-group">
                    <label>Телефон:</label>
                    <input type="tel" name="contact_phone" required>
                </div>
                
                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" name="contact_email" required>
                </div>
                
                <button type="submit" class="ok">Опубликовать вакансию</button>
            </form>
       </div>
    
</body>
</html>