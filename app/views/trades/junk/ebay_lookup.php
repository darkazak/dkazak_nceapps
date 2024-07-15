<html>

<head>
    <title>eBay Search Results</title>
    <style type="text/css">
        body {
            font-family: arial, sans-serif;
        }
    </style>
</head>

<body>
    <h1>eBay Search Results</h1>

    <form action="">
        <input type="text" id="search_term">
        <button onclick="popUpEbay('cannon+eos+5d')">eBay Search</button>
    </form>
    <div id="results"></div>
    <script>
        function popUpEbay(item_str) {

            //document.getElementById('search_term').value;

            pop_url = "https://www.ebay.com/sch/i.html?_from=R40&_nkw=";
            pop_url += document.getElementById('search_term').value;
            pop_url += "&_sacat=0&LH_PrefLoc=1&LH_ItemCondition=3000&rt=nc&LH_Sold=1&LH_Complete=1"
            window.open(pop_url);


        }
    </script>

</body>

</html>