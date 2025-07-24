<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Title</title>
    </head>
    <body>
        <h1>
            <?php
            #normal print
            print "hello world!";

            #arrays
            $books = [
                "book1",
                "book2",
                "book3"
            ];
            ?>

            <?php
            foreach ($books as $book) {
                print "<ul>hello</ul>";
            }?>

            <?php
            foreach ($books as $book) {
                print "<ul>$book</ul>";
            }
            ?>

            <?php
            foreach ($books as $book) {
                print "<ul>{$book}1</ul>";
            } ?>

            <?php foreach ($books as $book) : ?>
                <li>Hello</li>
            <?php endforeach; ?>

            <?php foreach ($books as $book) : ?>
                <li><?= $book; ?></li>
            <?php endforeach; ?>

            <br>

            <?= $books[1]?>

            <br>

            <?php
            #Associative Arrays
            $arraybook = [
                [
                    'book' => 'book1',
                    'author' => 'author1',
                    'date' => 2020
                ],
                [
                    'book' => 'book2',
                    'author' => 'author2',
                    'date' => 2019
                ],
                [
                    'book' => 'book3',
                    'author' => 'author3',
                    'date' => 2023
                ],
                [
                    'book' => 'book4',
                    'author' => 'author3',
                    'date' => 2019
                ]
            ]
            ?>

            <br>

            <?php foreach ($arraybook as $abook) : ?>
            <li><?= $abook['book'] ?></li>
            <?php endforeach;?>

            <br>

            <?php foreach ($arraybook as $abook): ?>
                <li>
                    <?= $abook['book'] ?> by <?= $abook['author'] ?>
                </li>
            <?php endforeach; ?>

            <br>
            <?php foreach ($arraybook as $abook) : ?>
                <?php if ($abook['author'] === 'author1') :  #Array Filtering?>

                    <ul>
                        <?= $abook['book']; ?> by
                        <?= $abook['author']; ?> at
                        <?= $abook['date']; ?>
                    </ul>
                <?php endif; ?>
            <?php endforeach; ?>

            <?php #Function
                function filtering(){
                    return 'filtering text';
                }

                filtering(); #call for function

                echo filtering();

                function filteringdate($arraybook) {
                    $filteredbookdate =[];
                    foreach ($arraybook as $abook) {
                        if ($abook['date'] === 2019) {
                            $filteredbookdate[] = $abook;
                        }
                    }
                    return $filteredbookdate;
                }
            ?>

            <br>

            <?php foreach (filteringdate($arraybook) as $abook) : ?>
                <li>
                    <?= $abook['book'] ?> at <?= $abook['date'] ?>
                </li>
            <?php endforeach; ?>
            <br>

            <?php
            function filteringbook($arraybook, $book) {
                $filteredbookbook =[];
                foreach ($arraybook as $abook) {
                    if ($abook['book'] === $book) {
                        $filteredbookbook[] = $abook;
                    }
                }
                return $filteredbookbook;
            }
            ?>

            <?php foreach (filteringbook($arraybook, 'book2') as $abook) : ?>
                <li>
                    <?= $abook['book'] ?> at <?= $abook['date'] ?>
                </li>
            <?php endforeach; ?>
        </h1>
    </body>
</html>