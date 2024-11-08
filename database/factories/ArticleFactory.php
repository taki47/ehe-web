<?php
namespace Database\Factories;

use App\ImageHelper;
use App\Models\Menu;
use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    protected $model = Article::class;

    public function definition()
    {
        // Random language ID selection
        $langId = $this->faker->numberBetween(1, 3);
        $title = $this->faker->sentence;

        // Default data
        return [
            'article_type_id' => 1, // Default article type
            'language_id' => $langId,
            'menu_id' => $this->getMenuId($langId),
            'title' => $title,
            'slug' => Str::slug($title),
            'cover_path' => "/uploads/test/",
            'cover' => $this->getImage(),
            'lead' => $this->faker->text(500),
            'body' => $this->faker->paragraphs(5, true),
            'delayed' => $this->faker->dateTime,
            'form' => $this->faker->word,
            'article_status_id' => 3,
            'created_by' => 1,
            'updated_by' => null,
            'created_at' => now(),
            'updated_at' => null,
        ];
    }

    public function event()
    {
        return $this->state(function (array $attributes) {
            return [
                'article_type_id' => 3,
                'event_start_date' => $this->faker->dateTime,
                'event_end_date' => $this->faker->dateTime,
                'event_location' => $this->faker->address,
            ];
        });
    }

    private function getMenuId($langId)
    {
        $menus = Menu::where("language_id", $langId)->get();

        if ($menus->isEmpty()) {
            return null;
        }

        return $menus->random()->id;
    }

    private function getImage()
    {
        $imageUrl = "https://loremflickr.com/640/480";
        $imageContent = $this->downloadImage($imageUrl);

        $tempFile = tempnam(sys_get_temp_dir(), 'temp_image_');
        file_put_contents($tempFile, $imageContent);

        $uploadedFile = new \Illuminate\Http\UploadedFile(
            $tempFile,
            'image.jpg',
            'image/jpeg',
            null,
            true
        );

        $imageHelper = new ImageHelper($uploadedFile, "/uploads/test/");
        $uploadedImagePath = $imageHelper->UploadImage("new");

        unlink($tempFile);

        return $uploadedImagePath;
    }

    private function downloadImage($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 5);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $imageData = curl_exec($ch);
        curl_close($ch);

        if (!$imageData) {
            throw new \Exception("Unable to download image from URL: " . $url);
        }

        return $imageData;
    }
}
