<?php
namespace app\commands;

use app\models\Books;
use app\models\Authors;
use yii\console\Controller;
use yii\console\ExitCode;
use Faker;
use Faker\Factory;

class InsertController extends Controller
{
    public function actionIndex()
    {
        $faker = Factory::create('ru_RU');

        $faker->addProvider(new Faker\Provider\Base($faker));

        $faker->addProvider(new class($faker) extends Faker\Provider\Base {
            protected static $bookGenres = [
                'Фэнтези',
                'Научная Фантастика',
                'Детектив',
                'Роман',
                'Триллер',
                'Историческая Проза',
                'Ужасы',
                'Научная Литература',
                'Биография',
                'Психология и Саморазвитие',
                'Подростковая Литература',
                'Поэзия',
                'Дистопия',
                'Приключения',
            ];

            public function bookGenre()
            {
                return static::randomElement(static::$bookGenres);
            }
        });

        $faker->addProvider(new Faker\Provider\Base($faker));

        $faker->addProvider(new class($faker) extends Faker\Provider\Base {
            protected static $languages = [
                'Английский',
                'Испанский',
                'Японский',
                'Французский',
                'Немецкий',
                'Итальянский',
                'Русский',
                'Китайский',
                'Арабский',
                'Португальский',
            ];

            public function bookLanguage()
            {
                return static::randomElement(static::$languages);
            }
        });

        for ($i = 1; $i <= 100; $i++) {
            $author = new Authors;
            $author->setAttributes([
                'name' => $faker->firstName.' '.$faker->lastName,
                'birth_year' => random_int(1500, 2000),
                'country' => $faker->country(),
            ]);
            $author->save();
            echo "$author->id. $author->name\n";
        }

        for ($i = 1; $i <= 100; $i++) {
            $book = new Books;
            $book->setAttributes([
                'title' => $faker->realText(22),
                'author_id' => $i,
                'pages' => random_int(200, 2000),
                'language' => $faker->bookLanguage(),
                'genre' => $faker->bookGenre(),
                'description' => $faker->realText(1000),
            ]);
            $book->save();
            echo "$book->id. $book->title - $book->language - $book->genre\n";
        }


        return ExitCode::OK;
    }
}
