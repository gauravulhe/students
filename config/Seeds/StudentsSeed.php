<?php
use Phinx\Seed\AbstractSeed;

/**
 * Students seed.
 */
class StudentsSeed extends AbstractSeed
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
                  'full_name'      => 'Full Name - '.$i,
                  'address'      => 'address - '.$i,
                  'enrollment_number' => 'ADEPU8765'.$i,
                  'roll_number'         => 'RTMNU5678'.$i,
                  'course_id'    => $i,
                  'branch_id'     => $i,
                  'year_of_passing'     => '2012-06-01',
                  'created'       => date('Y-m-d H:i:s'),
                  'modified'       => date('Y-m-d H:i:s'),
              ];
          }

          $this->insert('students', $data);
    }
}
