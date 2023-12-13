<?php

    $pokemons_api = file_get_contents('https://pokeapi.co/api/v2/pokemon');
    $pokemons = json_decode($pokemons_api, true);

    for ($i=0; $i < 20; $i++) { 
        $pokemon = $pokemons['results'][$i];


        $todas_infos_api = file_get_contents($pokemon['url']);
        $pokemons['results'][$i] = json_decode($todas_infos_api, true);
    }

    
    if(isset($_GET['campo_busca'])){

        $encontrados = [];
        
        foreach ($pokemon['results'] as $poke) {
            if (str_contains($poke['name'], $_GET['campo_busca'])){
                $encontrados[] = $poke;
        }
    }

        $pokemons = $encontrados;
}
    
