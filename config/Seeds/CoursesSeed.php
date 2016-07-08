<?php
use Phinx\Seed\AbstractSeed;

/**
 * Courses seed.
 */
class CoursesSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
          $data = [];
          for ($i = 1; $i <= 100; $i++) {
              $data[] = [
                  'name'      => 'Course-'.$i,
                  'created'       => date('Y-m-d H:i:s'),
                  'modified'       => date('Y-m-d H:i:s'),
              ];
          }

        $this->insert('courses', $data);
    }
}
