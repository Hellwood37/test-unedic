<?php

namespace App\DataFixtures;

use App\Entity\Department;
use App\Entity\Student;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        for($d=0; $d < 10; $d++){
            $department = new Department();
            $department->setName($faker->city)
                        ->setCapacity(random_int(1000 , 10000));

                $manager->persist($department);
            
            for($s = 0; $s < 30; $s++){

                $student = new Student();
                $student->setFirstName($faker->FirstName)
                        ->setLastName($faker->LastName)
                        ->setNumEtud(random_int(1000 , 10000))
                        ->setDepartment($department);
            }
        }

        $manager->flush();
    }
}
