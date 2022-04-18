<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">

            <div class="col-4">


                <?php

                for ($i = 1; $i <= 100; $i++) {
                    echo "$i <br>";
                }



                ?>

            </div>




            <div class="col-4">
                <p>

                    <?php

                    for ($i = 0; $i <= 100; $i += 2) {
                        echo "$i <br>";
                    }



                    ?>
                </p>

            </div>



            <div class="col-4 ">

                <?php

                for ($i = 0; $i <= 100; $i++) {
                    if ($i == 61) {
                        break;
                    }
                    echo "$i <br>";
                }



                ?>

            </div>

        </div>
    </div>
</body>

</html>