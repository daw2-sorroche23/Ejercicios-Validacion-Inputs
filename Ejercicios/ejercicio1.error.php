<?php
$db = mysqli_connect('localhost', 'root', 'Pokemon2001!') or 
die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'moviesite') or die(mysqli_error($db));


switch ($_GET['action']) {
case 'add':
    switch ($_GET['type']) {
        case 'movie':
            $error = array();
            $movie_name = isset($_POST['movie_name']) ?
                trim($_POST['movie_name']) : '';
            if (empty($movie_name)) {
                $error[] = urlencode('Please enter a movie name.');
            }
            $movie_type = isset($_POST['movie_type']) ?
                trim($_POST['movie_type']) : '';
            if (empty($movie_type)) {
                $error[] = urlencode('Please select a movie type.');
            }
            $movie_year = isset($_POST['movie_year']) ?
                trim($_POST['movie_year']) : '';
            if (empty($movie_year)) {
                $error[] = urlencode('Please select a movie year.');
            }
            $movie_leadactor = isset($_POST['movie_leadactor']) ?
                trim($_POST['movie_leadactor']) : '';
            if (empty($movie_leadactor)) {
                $error[] = urlencode('Please select a lead actor.');
            }
            $movie_director = isset($_POST['movie_director']) ?
                trim($_POST['movie_director']) : '';
            if (empty($movie_director)) {
                $error[] = urlencode('Please select a director.');
            }
            if (empty($error)) {
                $query = 'INSERT INTO
                    movie
                        (movie_name, movie_year, movie_type, movie_leadactor,
                        movie_director)
                    VALUES
                        ("' . $movie_name . '",
                        ' . $movie_year . ',
                        ' . $movie_type . ',
                        ' . $movie_leadactor . ',
                        ' . $movie_director . ')';
            } else {
            header('Location:movie.php?type=add&action=add' .
                '&error=' . join(urlencode('<br/>'),$error));
            }
            break;
        case 'people':
                $error = array();
                //si existe que le quite los espacios
                $people_name = isset($_POST['people_name']) ?
                    trim($_POST['people_name']) : '';
                //si esta vacia manda un error 
                if (empty($people_name)) {
                    $error[] = urlencode('Please enter a people name.');
                }
                $people_rol = isset($_POST['profesion']) ?
                    trim($_POST['profesion']) : '';
                if (empty($people_rol)) {
                    $error[] = urlencode('Please select a profession.');
                }
                if($people_rol!="actor" || $people_rol!="actor" ||  $people_rol!="dos"){
                    $error[] = urlencode('Seleciona bien su profesión');
                }
                if (empty($error)) {
                    if($_POST['profesion']=="actor"){
                        $actor=1;
                        $director=0;
                    }if($_POST['profesion']=="director"){
                        $actor=1;
                        $director=0;
                    }if($_POST['profesion']=="dos"){
                        $actor=1;
                        $director=1;
                    }
                    $query = 'INSERT INTO
                        people
                            (people_fullname, people_isactor, people_isdirector)
                        VALUES
                            ("' . $_POST['people_name'] . '",
                             ' . $actor. ',
                             '  .$director. ')';
                } else {
                header('Location:ejercicio1.people.php?type=add&action=add' .
                    '&error=' . join(urlencode('<br/>'),$error));
                }
                break;
    }
    break;
case 'edit':
    switch ($_GET['type']) {
    case 'movie':
        $error = array();
        $movie_name = isset($_POST['movie_name']) ?
            trim($_POST['movie_name']) : '';
        if (empty($movie_name)) {
            $error[] = urlencode('Please enter a movie name.');
        }
        $movie_type = isset($_POST['movie_type']) ?
            trim($_POST['movie_type']) : '';
        if (empty($movie_type)) {
            $error[] = urlencode('Please select a movie type.');
        }
        $movie_year = isset($_POST['movie_year']) ?
            trim($_POST['movie_year']) : '';
        if (empty($movie_year)) {
            $error[] = urlencode('Please select a movie year.');
        }
        $movie_leadactor = isset($_POST['movie_leadactor']) ?
            trim($_POST['movie_leadactor']) : '';
        if (empty($movie_leadactor)) {
            $error[] = urlencode('Please select a lead actor.');
        }
        $movie_director = isset($_POST['movie_director']) ?
            trim($_POST['movie_director']) : '';
        if (empty($movie_director)) {
            $error[] = urlencode('Please select a director.');
        }
        if (empty($error)) {
            $query = 'UPDATE
                    movie
                SET 
                    movie_name = "' . $movie_name . '",
                    movie_year = ' . $movie_year . ',
                    movie_type = ' . $movie_type . ',
                    movie_leadactor = ' . $movie_leadactor . ',
                    movie_director = ' . $movie_director . '
                WHERE
                    movie_id = ' . $_POST['movie_id'];
        } else {
          header('Location:movie.php?action=edit&type=addid=' . $_POST['movie_id'] .
              '&error=' . join($error, urlencode('<br/>')));
        }
        break;
    case 'people':
        $error = array();
        //si existe que le quite los espacios
        $people_name = isset($_POST['people_name']) ?
            trim($_POST['people_name']) : '';
        //si esta vacia manda un error 
        if (empty($people_name)) {
            $error[] = urlencode('Please enter a people name.');
        }
        $people_rol = isset($_POST['profesion']) ?
            trim($_POST['profesion']) : '';
        if (empty($people_rol)) {
            $error[] = urlencode('Please select a profession.');
        }
        if($people_rol!="actor" || $people_rol!="actor" ||  $people_rol!="dos"){
            $error[] = urlencode('Seleciona bien su profesión');
        }
        if (empty($error)) {
            if($_POST['profesion']=="actor"){
                $actor=1;
                $director=0;
            }if($_POST['profesion']=="director"){
                $actor=1;
                $director=0;
            }if($_POST['profesion']=="dos"){
                $actor=1;
                $director=1;
            }
            $query = 'UPDATE people SET
                    people_fullname = "' . $_POST['people_name'] . '",
                    people_isactor = "' .$actor. '",
                    people_isdirector = "' .$director. '"
                WHERE
                    people_id = ' . $_POST['people_id'];
        } else {
            header('Location:ejercicio1.people.php.php?type=add&action=add' .
                '&error=' . join(urlencode('<br/>'),$error));
        }
        break;
    }
    break;
}

if (isset($query)) {
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
}
?>
<html>
 <head>
  <title>Commit</title>
 </head>
 <body>
  <p>Done!</p>
 </body>
</html>