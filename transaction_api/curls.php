<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>example</title>
  </head>
  <body>
    <div id="transaction_list"></div>
    <script src="jquery.min.js"></script>
    <script>
    $(document).ready(function()
    {
      setInterval(function()
      {
        $("#transaction_list").load("curlss.php");
        refresh();
      }, 200);
    });
    </script>
  </body>
</html>
