<?php
Route::get('/produtos', 'ProdutoController@lista');
Route::get('/produtos/mostra/{id}','ProdutoController@mostra')->where('id', '[0-9]+');
