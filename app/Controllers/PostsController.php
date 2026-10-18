<?php

namespace App\Controllers;
use Framework\Database;

class PostsController
{
    public function show()
    {

        view(
            'posts', 
            [
                'title' => 'Publicaciones',
                'post'  => db()
                ->query('SELECT * FROM posts WHERE id = :id ORDER BY id DESC',
                [
                    'id' => $_GET['id'] ?? null
                ])
                ->firstOrFail(),
            ]
        );
    }
}