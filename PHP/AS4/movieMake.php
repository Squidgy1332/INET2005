<?php

$Movies = array( 
    array("Pink Flamingos","https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcTC3GRUQPZkD6q-1kL1U_ZtXEtiMo-xk6GPBdCUUGQMt0cQrVXt","Jhon Waters","Divine","https://www.imdb.com/title/tt0069089/","1972","Comedy/Crime"),
    array("The Blob","https://m.media-amazon.com/images/M/MV5BOWQ1ODYxYjItMzg0OS00YjM3LWFjNTAtOTQxODUxMDdiYTkxXkEyXkFqcGdeQXVyMTUzMDUzNTI3._V1_.jpg","Chuck Russell","Shawnee Smith","https://www.imdb.com/title/tt0094761/?ref_=tt_mv_close","1988","Horror Sci-Fi Thriller"),
    array("Suburban Sasquatch","https://www.voicesfromthebalcony.com/wp-content/uploads/2022/08/SUBURBAN-SASQUATCH-6.jpg","Dave Wascavage","Sue Lynn Sanchez","https://www.imdb.com/title/tt0481297/","2004","Action Comedy Adventure"),
    array("Freddy Got Fingered","https://m.media-amazon.com/images/M/MV5BN2Q5YjBkZGEtMmJkZC00NzFkLTliZTYtNmQ2OTk1ODdiODdiXkEyXkFqcGdeQXVyMTQxNzMzNDI@._V1_.jpg","Tom Green","Tom Green","https://www.imdb.com/title/tt0240515/","2001","Comedy"),
    array("The Room","https://m.media-amazon.com/images/M/MV5BN2IwYzc4MjEtMzJlMS00MDJlLTkzNDAtN2E4NGNkZjg0MDgxXkEyXkFqcGdeQXVyMjQwMDg0Ng@@._V1_FMjpg_UX1000_.jpg","Tommy Wiseau","Tommy Wiseau","https://www.imdb.com/title/tt0368226/","2003","Drama"),
    array("Disaster Movie","https://upload.wikimedia.org/wikipedia/en/a/af/Disaster_movie.jpg","Jason Friedberg","Matt Lanter","https://www.imdb.com/title/tt1213644/","2008","Comedy"),
    array("Birdemic: Shock and Terror","https://assets.americancinematheque.com/wp-content/uploads/2022/09/11204223/Birdemic_Hero.jpg","James Nguyen","Alan Bagh","https://www.imdb.com/title/tt1316037/","2010","Horror"),
    array("Superbabies: Baby Geniuses 2","https://m.media-amazon.com/images/M/MV5BNjY4NjM3MjQ2OF5BMl5BanBnXkFtZTcwOTc3NzYyMQ@@._V1_FMjpg_UX1000_.jpg","Bob Clark","Jon Voight","https://www.imdb.com/title/tt0270846/","2004","Comedy"),
    array("Catwoman","https://m.media-amazon.com/images/M/MV5BMjA4MzM0NDAzOF5BMl5BanBnXkFtZTcwMDY3MDYyMQ@@._V1_FMjpg_UX1000_.jpg","Pitof","Halle Berry","https://www.imdb.com/title/tt0327554/","2004","Action"),
    array("Glitter","https://m.media-amazon.com/images/M/MV5BYWYzN2I5NWItYTdmNS00ZWNmLWI0MWItMTJhN2FjMjY3MDQ1XkEyXkFqcGdeQXVyMTQxN73MzNDI@._V1_.jpg","Vondie Curtis-Hall","Mariah Carey","https://www.imdb.com/title/tt0120834/","2001","Drama Music"));

    $dom = new DOMDocument();
        $dom->encoding = "utf-8";
        $dom->xmlVersion = "1.0";
        $dom->formatOutput = true;

    $File_Name = "Moves_list.xml";
    $root = $dom->createElement("Movies");

        for ($i=0; $i<count($Movies); $i++) {
            $movie_node = $dom->createElement("Movie");
            $Title = $dom->createElement("Title", $Movies[$i][0]);
            $movie_node->appendChild($Title);

            $Picture = $dom->createElement("Picture", $Movies[$i][1]);
            $movie_node->appendChild($Picture);

            $Director = $dom->createElement("Director", $Movies[$i][2]);
            $movie_node->appendChild($Director);

            $MainActor = $dom->createElement("MainActor", $Movies[$i][3]);
            $movie_node->appendChild($MainActor);

            $Link = $dom->createElement("Link", $Movies[$i][4]);
            $movie_node->appendChild($Link);

            $Year = $dom->createElement("Year", $Movies[$i][5]);
            $movie_node->appendChild($Year);

            $Genre = $dom->createElement("Genre", $Movies[$i][6]);
            $movie_node->appendChild($Genre);
            
		    $root->appendChild($movie_node);
        }
		$dom->appendChild($root);
    $dom->save($File_Name);
?>