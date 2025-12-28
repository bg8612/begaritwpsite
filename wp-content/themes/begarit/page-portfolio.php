<?php
/*
Template Name: Begarit Portfolio
*/

// 1. Подключение шапки сайта (стандартная функция WP)
get_header(); 
?>

<!-- =========================================================================
     ПОДКЛЮЧЕНИЕ ЗАВИСИМОСТЕЙ (СТИЛИ, ШРИФТЫ, ИКОНКИ)
     ========================================================================= -->
<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
<script src="https://unpkg.com/lucide@latest"></script>

<style>
    /* CSS СТИЛИ */
    :root {
        --bg-color: #ffffff;
        --text-color: #111111;
        --gray-light: #f4f4f5;
        --gray-medium: #71717a;
    }

    /* Анимации */
    @keyframes fadeInUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }

    /* Сетка */
    .portfolio-grid { display: grid; grid-template-columns: 1fr; gap: 48px; margin-top: 40px; }
    @media (min-width: 768px) { .portfolio-grid { grid-template-columns: repeat(2, 1fr); gap: 32px; } }
    @media (min-width: 1280px) { .portfolio-grid { grid-template-columns: repeat(3, 1fr); column-gap: 40px; row-gap: 64px; } }

    /* Карточка */
    .project-card { cursor: pointer; display: flex; flex-direction: column; }
    .card-image-wrapper { position: relative; width: 100%; aspect-ratio: 4/3; overflow: hidden; border-radius: 8px; background-color: var(--gray-light); margin-bottom: 20px; }
    .card-image { width: 100%; height: 100%; object-fit: cover; transition: transform 0.6s cubic-bezier(0.25, 1, 0.5, 1); }
    .project-card:hover .card-image { transform: scale(1.05); }
    .card-arrow { position: absolute; top: 16px; right: 16px; width: 40px; height: 40px; background: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; opacity: 0; transform: translateY(10px); transition: all 0.3s ease; box-shadow: 0 4px 12px rgba(0,0,0,0.1); z-index: 20; }
    .project-card:hover .card-arrow { opacity: 1; transform: translateY(0); }

    /* Модальное окно (Overlay) */
    .project-page-overlay { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: #ffffff; z-index: 9999; overflow-y: auto; opacity: 0; transition: opacity 0.2s ease; }
    .project-page-overlay.active { display: block; opacity: 1; }
    .project-content-anim { opacity: 0; transform: translateY(40px); transition: all 0.6s cubic-bezier(0.16, 1, 0.3, 1); }
    .project-page-overlay.active .project-content-anim { opacity: 1; transform: translateY(0); }
    body.page-open { overflow: hidden; }

    /* Хедер модального окна */
    .page-header-controls { position: sticky; top: 0; left: 0; width: 100%; display: flex; justify-content: space-between; align-items: center; padding: 24px 40px; background: rgba(255,255,255,0.95); backdrop-filter: blur(10px); z-index: 50; border-bottom: 1px solid #f0f0f0; }

    /* Типографика */
    .hero-title { font-size: 3.5rem; line-height: 1.1; font-weight: 600; letter-spacing: -0.02em; }
    @media(min-width: 1024px) { .hero-title { font-size: 5rem; } }

    /* Галерея-Аккордеон */
    .gallery-accordion { border: 1px solid #e5e7eb; border-radius: 12px; overflow: hidden; transition: all 0.3s ease; }
    .gallery-header { display: flex; align-items: center; justify-content: space-between; padding: 16px 20px; background: white; cursor: pointer; transition: background-color 0.2s; }
    .gallery-header:hover { background-color: #f9fafb; }
    .thumb-row { display: flex; gap: 12px; overflow-x: auto; -ms-overflow-style: none; scrollbar-width: none; }
    .thumb-row::-webkit-scrollbar { display: none; }
    .thumb-item { width: 48px; height: 48px; border-radius: 6px; object-fit: cover; border: 1px solid transparent; transition: all 0.2s; }
    .thumb-item.active { border-color: #111; transform: scale(1.05); }
    .accordion-arrow { transition: transform 0.3s ease; }
    .accordion-arrow.rotated { transform: rotate(180deg); }
    .gallery-body { max-height: 0; overflow: hidden; transition: max-height 0.4s cubic-bezier(0.4, 0, 0.2, 1); background: #f9fafb; }
    /* Обновленные стили для главной картинки галереи */
    .gallery-main-image { 
        width: 100%; 
        height: auto; /* Позволяет менять высоту пропорционально */
        display: block; 
        opacity: 0; 
        transition: opacity 0.3s ease; 
    }
    .gallery-main-image.visible { opacity: 1; }
</style>

<!-- =========================================================================
     ОСНОВНАЯ РАЗМЕТКА СТРАНИЦЫ
     ========================================================================= -->
<main class="max-w-[1600px] mx-auto px-6 pb-12 md:pb-20 pt-0" id="main-content">
    
    <!-- Заголовок страницы -->
    <div class="mb-20 max-w-4xl animate-[fadeInUp_0.6s_ease-out]">
        <h1 class="hero-title mb-8">
            Избранные работы
        </h1>
    </div>

    <!-- Контейнер сетки (Grid) -->
    <div class="portfolio-grid" id="grid"></div>

</main>

<!-- =========================================================================
     МОДАЛЬНОЕ ОКНО ПРОЕКТА
     ========================================================================= -->
<div id="projectOverlay" class="project-page-overlay">
    
    <!-- Фиксированный хедер с логотипом и кнопкой закрытия -->
    <div class="page-header-controls">
        <div class="text-lg font-bold flex items-center gap-2">
            <!-- SVG Логотип -->
            <svg class="h-8 w-auto text-black" viewBox="0 0 813 862" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M615.672 52.2842C620.632 45.8538 630.922 49.3609 630.922 57.4814V518.727C630.922 604.267 568.386 675.444 485.791 690.551C483.242 691.017 480.998 692.558 479.722 694.813L466.155 718.804C464.528 721.681 464.714 725.241 466.632 727.933L539.76 830.536C541.357 832.777 543.94 834.106 546.691 834.106H593.581C600.833 834.106 607.382 837.228 612.131 842.277C615.077 845.41 617.326 849.279 618.608 853.606C619.943 858.113 616.005 862.001 611.305 862.001H532.083C529.331 862.001 526.749 860.67 525.152 858.43L410.158 697.091C408.561 694.85 405.98 693.52 403.228 693.52H337.275C334.207 693.52 331.377 695.171 329.867 697.841L318.012 718.804C316.385 721.681 316.571 725.241 318.49 727.933L391.618 830.536C393.215 832.777 395.797 834.106 398.548 834.106H445.438C452.691 834.106 459.239 837.228 463.989 842.277C466.935 845.41 469.183 849.279 470.465 853.606C471.801 858.113 467.863 862.001 463.163 862.001H383.94C381.189 862.001 378.606 860.67 377.009 858.43L262.015 697.091C260.418 694.85 257.823 693.499 255.074 693.602C184.313 696.232 132.221 762.086 146.931 832.067C148.205 838.129 149.736 844.402 151.538 850.904C153.071 856.435 148.979 862.001 143.24 862.001H8.526C1.46042 862.001 -2.52784 853.889 1.78675 848.294L121.144 693.52L615.672 52.2842ZM803.503 0C810.568 0.000136838 814.557 8.11289 810.242 13.708L675.738 188.122C670.779 194.553 660.489 191.046 660.489 182.925V52.2842C660.489 23.4108 684.313 3.44399e-05 713.696 0H803.503Z" fill="black"/>
            </svg>
            <span>Begarit Studio</span>
        </div>
        <button class="flex items-center gap-3 text-sm font-medium hover:text-gray-600 transition-colors group" onclick="closeProject()">
            <span class="hidden md:inline group-hover:mr-1 transition-all">Закрыть</span>
            <div class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center transition-colors">
                <i data-lucide="x" class="w-5 h-5"></i>
            </div>
        </button>
    </div>

    <!-- Контейнер для динамического контента проекта -->
    <div class="max-w-[1400px] mx-auto px-6 pb-32 pt-12 project-content-anim" id="projectContent"></div>
</div>

<!-- =========================================================================
     JAVASCRIPT LOGIC + PHP DATA FETCHING
     ========================================================================= -->
<script>
    /*
     * 1. СБОР ДАННЫХ ИЗ WORDPRESS
     */
    <?php
    $args = array(
        'post_type' => 'portfolio_project', // Обращение к типу записей из Плагина
        'posts_per_page' => -1,             // Получить все проекты
        'orderby' => 'menu_order date',     // Сортировка
        'order' => 'DESC'
    );
    $query = new WP_Query($args);
    $projects_data = [];

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            $id = get_the_ID();
            
            // --- Сбор Мета-данных ---
            $tags_raw = get_post_meta($id, '_bg_tags', true);
            $tags = !empty($tags_raw) ? array_map('trim', explode(',', $tags_raw)) : [];
            
            $metrics = get_post_meta($id, '_bg_metrics', true);
            if(!is_array($metrics)) $metrics = [];
            
            $gallery = get_post_meta($id, '_bg_gallery', true);
            if(!is_array($gallery)) $gallery = [];
            
            $table = get_post_meta($id, '_bg_table', true);
            if(!is_array($table)) $table = [];

            $content = apply_filters('the_content', get_the_content());
            
            $projects_data[] = [
                'id' => $id,
                'slug' => get_post_field('post_name', $id), // Добавляем slug для URL
                'title' => get_the_title(),
                'category' => get_post_meta($id, '_bg_type', true),
                'tags' => $tags,
                'shortDesc' => get_post_meta($id, '_bg_short_desc', true),
                'cover' => get_the_post_thumbnail_url($id, 'full'),
                'client' => get_post_meta($id, '_bg_client', true),
                'year' => get_post_meta($id, '_bg_year', true),
                'metrics' => $metrics,
                'content' => $content,
                'gallery' => $gallery,
                'tableData' => $table
            ];
        endwhile;
        wp_reset_postdata();
    endif;
    ?>

    // Передача PHP массива в JS константу
    const projects = <?php echo json_encode($projects_data); ?>;

    
    /*
     * 2. ОТРИСОВКА СЕТКИ ПРОЕКТОВ
     */
    const grid = document.getElementById('grid');
    
    if (!projects || projects.length === 0) {
        grid.innerHTML = '<div class="col-span-full text-center text-gray-500 py-20">Проекты портфолио еще не добавлены в админ-панели (раздел Проекты).</div>';
    } else {
        projects.forEach((p, index) => {
            const card = document.createElement('div');
            card.className = 'project-card group animate-[fadeInUp_0.5s_ease-out]';
            card.style.animationDelay = `${index * 0.1}s`;
            // !!! ВАЖНО: передаем индекс, а не объект
            card.onclick = () => openProject(index);

            const tagsHtml = p.tags.slice(0,2).map(tag => `<span class="text-xs text-gray-400">#${tag}</span>`).join('');
            const catDisplay = p.category ? p.category.split('/')[0] : '';
            const coverImg = p.cover ? p.cover : 'https://via.placeholder.com/800x600?text=No+Image';

            card.innerHTML = `
                <div class="card-image-wrapper">
                    <img src="${coverImg}" class="card-image" alt="${p.title}">
                    <div class="card-arrow">
                        <i data-lucide="arrow-up-right" class="w-5 h-5 text-black"></i>
                    </div>
                </div>
                
                <div class="flex flex-col gap-2">
                    <div class="flex justify-between items-start">
                        <h3 class="text-xl font-bold leading-tight group-hover:text-gray-600 transition-colors">${p.title}</h3>
                        <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider border border-gray-200 px-2 py-1 rounded">${catDisplay}</span>
                    </div>
                    
                    <p class="text-sm text-gray-500 line-clamp-2 leading-relaxed max-w-[90%]">
                        ${p.shortDesc}
                    </p>

                    <div class="flex gap-2 mt-2 flex-wrap">
                        ${tagsHtml}
                    </div>
                </div>
            `;
            grid.appendChild(card);
        });
    }

    lucide.createIcons();


    /*
     * 3. ЛОГИКА ОТКРЫТИЯ ПРОЕКТА
     */
    const overlay = document.getElementById('projectOverlay');
    const content = document.getElementById('projectContent');

    function openProject(index) {
        // Защита от ошибок
        if (index < 0 || index >= projects.length) return;

        const project = projects[index];
        // Вычисляем индекс следующего проекта для навигации
        const nextIndex = (index + 1) % projects.length;
        const nextProject = projects[nextIndex];

        // Обновляем URL (Deep Linking)
        if(project.slug) {
            window.location.hash = project.slug;
        }

        document.body.classList.add('page-open');
        overlay.classList.add('active');
        
        // --- HTML Метрик ---
        let metricsHtml = '';
        if (project.metrics && project.metrics.length > 0) {
            metricsHtml = project.metrics.map(m => `<span class="bg-gray-100 px-2 py-1 rounded text-sm font-medium">${m}</span>`).join('');
        }

        // --- HTML Галереи (с заголовком) ---
        let galleryHtml = '';
        if (project.gallery && project.gallery.length > 0) {
            const thumbsHtml = project.gallery.map((img, i) => `
                <img src="${img}" class="thumb-item ${i === 0 ? 'active' : ''}" data-index="${i}" data-src="${img}">
            `).join('');
            
            galleryHtml = `
            <!-- Заголовок галереи (по просьбе пользователя) -->
            <h3 class="text-2xl font-bold mb-6">Галерея проекта</h3>
            
            <div class="gallery-accordion mb-24 w-full">
                <!-- Header -->
                <div class="gallery-header" id="accHeader">
                    <div class="thumb-row" id="thumbContainer">${thumbsHtml}</div>
                    <div class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-100 ml-4 flex-shrink-0">
                        <i data-lucide="chevron-down" class="accordion-arrow w-5 h-5 text-gray-500" id="accIcon"></i>
                    </div>
                </div>
                <!-- Body -->
                <div class="gallery-body" id="accBody">
                    <div class="p-4 md:p-6">
                        <img src="${project.gallery[0]}" class="gallery-main-image rounded-lg w-full" id="accMainImage">
                    </div>
                </div>
            </div>`;
        }

        // --- HTML Таблицы ---
        let tableHtml = '';
        if (project.tableData && project.tableData.length > 0) {
            const tableRows = project.tableData.map(row => `
                <tr class="hover:bg-gray-50/50 transition-colors">
                    <td class="py-4 px-6 font-medium text-gray-900">${row.metric}</td>
                    <td class="py-4 px-6 text-gray-500 text-right font-medium">${row.before}</td>
                    <td class="py-4 px-6 font-bold text-gray-900 text-right">
                        ${row.after}
                        <span class="inline-flex ml-2 text-green-500"><i data-lucide="trending-up" class="w-4 h-4"></i></span>
                    </td>
                </tr>
            `).join('');

            const mobileCards = project.tableData.map(row => `
                <div class="bg-white rounded-xl border border-gray-200 p-5 shadow-sm">
                    <div class="font-medium text-gray-900 mb-4 border-b border-gray-100 pb-3">${row.metric}</div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <div class="text-xs text-gray-400 uppercase mb-1">До</div>
                            <div class="font-medium text-gray-500">${row.before}</div>
                        </div>
                        <div class="text-right">
                            <div class="text-xs text-green-600 uppercase mb-1 font-semibold">После</div>
                            <div class="font-bold text-gray-900 inline-flex items-center gap-1">
                                ${row.after}
                                <i data-lucide="trending-up" class="w-3 h-3 text-green-500"></i>
                            </div>
                        </div>
                    </div>
                </div>
            `).join('');

            tableHtml = `
            <div class="mb-20">
                <h3 class="text-2xl font-bold mb-6">Результаты в цифрах</h3>
                <div class="hidden md:block overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm whitespace-nowrap md:whitespace-normal">
                            <thead class="bg-gray-50 border-b border-gray-100">
                                <tr>
                                    <th class="py-4 px-6 font-semibold text-gray-900 w-1/2">Метрика</th>
                                    <th class="py-4 px-6 font-semibold text-gray-500 text-right">До обращения</th>
                                    <th class="py-4 px-6 font-semibold text-green-600 text-right">После внедрения</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">${tableRows}</tbody>
                        </table>
                    </div>
                </div>
                <div class="md:hidden space-y-4">${mobileCards}</div>
            </div>`;
        }

        const coverImg = project.cover ? project.cover : 'https://via.placeholder.com/1600x900?text=No+Cover';
        const projectTitle = project.title || 'Проект';

        // --- ВСТАВКА КОНТЕНТА В МОДАЛКУ ---
        content.innerHTML = `
            <div class="">
                <!-- Заголовок и Инфо -->
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 mb-20">
                    <div class="lg:col-span-8">
                        <span class="inline-block px-3 py-1 rounded-full border border-gray-200 text-xs font-bold uppercase tracking-widest text-gray-500 mb-6">${project.category || 'Проект'}</span>
                        <h1 class="text-5xl md:text-7xl font-bold tracking-tight mb-8 leading-[1.1]">
                            ${projectTitle}
                        </h1>
                        <p class="text-xl md:text-2xl text-black font-normal max-w-3xl leading-relaxed">
                            ${project.shortDesc || ''}
                        </p>
                    </div>
                    
                    <div class="lg:col-span-4 flex flex-col justify-end">
                        <div class="border-t border-black pt-6 grid grid-cols-2 gap-y-8 gap-x-4">
                            <div>
                                <span class="block text-xs text-gray-400 uppercase mb-1">Клиент</span>
                                <span class="font-medium text-sm">${project.client || '-'}</span>
                            </div>
                            <div>
                                <span class="block text-xs text-gray-400 uppercase mb-1">Год</span>
                                <span class="font-medium text-sm">${project.year || '-'}</span>
                            </div>
                            <div class="col-span-2">
                                <span class="block text-xs text-gray-400 uppercase mb-1">Метрики успеха</span>
                                <div class="flex gap-3 flex-wrap">
                                    ${metricsHtml}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Главное изображение -->
                <div class="w-full aspect-[16/9] bg-gray-100 rounded-lg overflow-hidden mb-24">
                     <img src="${coverImg}" class="w-full h-full object-cover">
                </div>

                <!-- Текст "О проекте" -->
                <div class="mb-24">
                    <div class="mb-10">
                        <h3 class="text-2xl font-bold mb-4">О проекте</h3>
                        <div class="text-gray-600 leading-relaxed text-lg space-y-6">
                            ${project.content}
                        </div>
                    </div>
                </div>

                <!-- Галерея -->
                ${galleryHtml}

                <!-- Таблица -->
                ${tableHtml}

                <!-- Навигация (Следующий проект) -->
                <div class="border-t border-gray-200 pt-20 pb-10 text-center">
                    <p class="text-gray-400 text-sm uppercase tracking-widest mb-4">Следующий проект</p>
                    <h2 class="text-4xl md:text-6xl font-bold hover:text-gray-500 cursor-pointer transition-colors inline-block border-b-2 border-transparent hover:border-gray-200" onclick="openProject(${nextIndex})">
                        ${nextProject.title} &rarr;
                    </h2>
                </div>
            </div>
        `;
        
        overlay.scrollTop = 0;
        lucide.createIcons();
        if (project.gallery && project.gallery.length > 0) {
            initAccordion(project.gallery);
        }
    }

    /*
     * ЛОГИКА ГАЛЕРЕИ-АККОРДЕОНА
     */
    function initAccordion(images) {
        const header = document.getElementById('accHeader');
        const body = document.getElementById('accBody');
        const icon = document.getElementById('accIcon');
        const mainImg = document.getElementById('accMainImage');
        const thumbs = document.querySelectorAll('.thumb-item');
        let isOpen = false;

        // Плавное появление + Пересчет высоты, если картинка разной высоты
        mainImg.onload = () => { 
            if(isOpen) {
                mainImg.classList.add('visible');
                // Пересчитываем высоту контейнера под новую картинку
                body.style.maxHeight = body.scrollHeight + "px";
            }
        };

        header.onclick = (e) => {
            const clickedThumb = e.target.closest('.thumb-item');
            if (!isOpen) {
                openAccordion();
                updateImage(0); 
            } else {
                if (clickedThumb) {
                    e.stopPropagation();
                    const idx = parseInt(clickedThumb.dataset.index);
                    updateImage(idx);
                } else {
                    closeAccordion();
                }
            }
        };

        function openAccordion() {
            isOpen = true;
            body.style.maxHeight = body.scrollHeight + "px";
            icon.classList.add('rotated');
            // Даем задержку на анимацию
            setTimeout(() => {
               if(mainImg.complete) mainImg.classList.add('visible');
            }, 100);
        }
        function closeAccordion() {
            isOpen = false;
            body.style.maxHeight = "0px";
            icon.classList.remove('rotated');
            mainImg.classList.remove('visible');
        }
        function updateImage(index) {
            thumbs.forEach(t => t.classList.remove('active'));
            thumbs[index].classList.add('active');
            
            mainImg.classList.remove('visible');
            
            setTimeout(() => {
                mainImg.src = images[index];
                // onload обработает появление и ресайз
            }, 200);
        }
    }

    // Закрытие модального окна
    function closeProject() {
        overlay.classList.remove('active');
        document.body.classList.remove('page-open');
        
        // Очищаем хеш URL при закрытии
        history.replaceState(null, null, ' ');

        setTimeout(() => {
            content.innerHTML = ''; 
        }, 300);
    }

    // Закрытие по клавише ESC
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closeProject();
    });

    // Проверка URL Hash при загрузке страницы (Для Deep Linking)
    window.addEventListener('load', () => {
        const hash = window.location.hash.substring(1); // получаем хеш без #
        if(hash) {
            // Ищем проект по slug
            const foundIndex = projects.findIndex(p => p.slug === hash);
            if(foundIndex !== -1) {
                openProject(foundIndex);
            }
        }
    });

</script>

<?php
// 2. Подключение подвала сайта
get_footer(); 
?>