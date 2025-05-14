<?php
include 'config.php';
$vacancies = $pdo->query("SELECT * FROM vacancies ORDER BY created_at DESC")->fetchAll();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Доска вакансий</title>
    <link rel="stylesheet" href="stylee.css">
    
</head>
<body>
    <header>
            <a href="index.php">
                <button id="HomeButton" >
                    <img src="wks.png" alt="Главная"> 
                </button>
            </a>
    </header>
    <div class="search-container">
        <input type="text" id="searchInput" placeholder="Поиск вакансий..." class="search-input">
    </div>
    <main>
        <div class="slider">
            <div class="slides">
                <img src="image 12.png" alt="Изображение 1">
                <img src="image 22.png" alt="Изображение 2">
                <img src="image 32.png" alt="Изображение 3">
                
            </div>
           
        </div>
    
     <a href="add_vacancy.php" class="add-btn">Добавить вакансию</a>
   
    
    <?php foreach ($vacancies as $vacancy): ?>
    <div class="vacancy">
        <h2 class="vacancy-title"><?= htmlspecialchars($vacancy['title']) ?></h2>
        <div class="vacancy-salary"><?= htmlspecialchars($vacancy['salary']) ?></div>
        <div class="vacancy-description">
            <?= nl2br(htmlspecialchars($vacancy['description'])) ?>
        </div>
        <div class="vacancy-meta">
            <strong>Место работы:</strong> <?= htmlspecialchars($vacancy['location']) ?><br>
            <strong>Контактное лицо:</strong> <?= htmlspecialchars($vacancy['contact_name']) ?><br>
            <strong>Телефон:</strong> <?= htmlspecialchars($vacancy['contact_phone']) ?><br>
            <strong>Email:</strong> <?= htmlspecialchars($vacancy['contact_email']) ?>
        </div>
    </div>
    <?php endforeach; ?>
    <footer class="site-footer">
    <div class="footer-container">
        
       

        
        <div class="footer-column">
            <h3>Контакты</h3>
            <ul>
                <li> <a href="tel:+79207453155">+7 (999) 123-45-67</a></li>
                <li> <a href="wks@mail.ru">wks@mail.ru</a></li>
                <li> Москва, ул. Рабочая, 15, офис 52</li>
            </ul>
        </div>

       
       

   
    <div class="footer-bottom">
        <p>© 2025 WKS — Доска вакансий. Все права защищены.</p>
        
    </div>
</footer>
<script src="scrippt.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const vacancies = document.querySelectorAll('.vacancy');

        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();

            vacancies.forEach(vacancy => {
                const title = vacancy.querySelector('.vacancy-title').textContent.toLowerCase();
                if (title.includes(searchTerm)) {
                    vacancy.style.display = 'block';
                } else {
                    vacancy.style.display = 'none';
                }
            });
        });
    });
</script>
</body>
</html>