<section>
    <div class="container" style="user-select: text;">
        <?php
        // Функция для создания переменных из полей ACF
        function generate_acf_variables()
        {
            // Получаем ID текущего поста
            $post_id = get_the_ID();

            // Получаем все поля ACF для текущего поста
            $fields = get_field_objects($post_id);

            if ($fields) {
                $output = ''; // Переменная для хранения результата в виде текста

                foreach ($fields as $key => $field) {
                    // Проверяем, является ли поле изображением
                    if ($field['type'] === 'image' && !empty($field['value'])) {
                        if (is_numeric($field['value'])) {
                            // Если значение — это ID, используем wp_get_attachment_image
                            $output .= '$' . $key . ' = wp_get_attachment_image(get_field(\'' . $key . '\'), \'full\');' . PHP_EOL;
                        } else {
                            // Если значение — это URL
                            $output .= '$' . $key . ' = get_field(\'' . $key . '\');' . PHP_EOL;
                        }
                    } else {
                        // Для остальных типов полей
                        $output .= '$' . $key . ' = get_field(\'' . $key . '\');' . PHP_EOL;
                    }
                }

                return $output;
            }

            return '// Поля ACF не найдены для текущего поста';
        }

        // Генерация текста переменных
        $acf_variables_text = generate_acf_variables();
        ?>

        <pre><?= esc_html($acf_variables_text); ?></pre>

    </div>
</section>