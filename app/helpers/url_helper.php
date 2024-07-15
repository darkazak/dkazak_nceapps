<?php
// simple page re-direct

function redirect($page)
{
    header('location: ' . URLROOT . '/' . $page);
}

function thisPageID()
{

    $url = rtrim(thisUrl(), '/');
    $url = filter_var($url, FILTER_SANITIZE_URL);
    $url = explode('/', $url);
    $this_page = array_pop($url);
    $this_page == '' ? $this_page = 'home' : $this_page = $this_page;
    return $this_page;
}

function thisUrl()
{
    //$uri = $_SERVER['REQUEST_URI'];
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
return $url; // Outputs: Full URL
}

function renderJSON($jasonData)
{
    print_r($jasonData);
}

function makeUIButton($this_name, $this_class, $this_target = '', $this_function = '', $this_state = '', $this_id = '')
{

    echo '<input type="button" ';
    echo ' class="btn ';
    echo $this_class;
    echo '" value="';
    echo $this_name;
    echo '"';
    echo $this_state;
    echo ' ';
    if ($this_target != '') {
        echo ' onclick="pageLoad(\'';
        echo URLROOT;
        echo $this_target;
        echo '\')"';
    }
    if ($this_function != '') {
        echo 'onclick="';
        echo $this_function;
        echo '();"';
    }
    if ($this_id != '') {
        echo 'id="';
        echo $this_id;
        echo '"';
    } else {
        $this_new_id = strtolower(str_replace(" ", "_", $this_name));
        echo 'id="';
        echo $this_new_id;
        echo '"';
    }
    echo '>';
}

function makeSubmitButton($this_name, $this_class, $this_special = '')
{

    echo '<input ';
    echo 'type="submit" ';
    echo 'id="enter_button" ';
    echo 'class="btn ';
    echo $this_class;
    echo '" ';
    echo 'value="';
    echo $this_name;
    echo '" ';
    echo $this_special;
    echo '>';
}


function makePageTitle($this_title, $this_subtitle = '')
{
    echo '<div class="row mb-5 mt-3">';
    echo '<div class="col-12">';
    echo '<p class="h1">';
    echo $this_title;
    echo '</p>';
    if ($this_subtitle != '') {
        echo '<p class="h4 mb-3 lead-2 text-muted">';
        echo $this_subtitle;
        echo '</p>';
    }
    echo '</div></div>';
}


function calljavascriptOnLoad($function, $params)
{
    echo '<script type="text/JavaScript">' . $function . '(' . $params . ');</script>';
}
