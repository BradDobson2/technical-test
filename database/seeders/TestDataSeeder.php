<?php

namespace Database\Seeders;

use App\Models\Component;
use App\Models\Inspection;
use App\Models\InspectionComponent;
use App\Models\Turbine;
use App\Models\User;
use App\Models\WindFarm;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use MatanYadaev\EloquentSpatial\Objects\Polygon;
use MatanYadaev\EloquentSpatial\Objects\LineString;
use MatanYadaev\EloquentSpatial\Objects\Point;

class TestDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create(['email' => 'brad@windturbines.com']);

        /**
         * Create a wind farm with 5 turbines, each turbine having one of each component type.
         */
        $windFarm = WindFarm::factory()
            ->forUser($user)
            ->area($this->windFarmAreaPolygon())
            ->has(
                Turbine::factory(5)
                    ->state(new Sequence(
                        ['location' => new Point(-3.4013841, 55.9261227)],
                        ['location' => new Point(-3.3977578, 55.9264472)],
                        ['location' => new Point(-3.3933590, 55.9253172)],
                        ['location' => new Point(-3.3924363, 55.9221793)],
                        ['location' => new Point(-3.4015987, 55.9221552)],
                    ))
                    ->has(Component::factory()->bladeType())
                    ->has(Component::factory()->rotorType())
                    ->has(Component::factory()->hubType())
                    ->has(Component::factory()->generatorType())
            )->create();

        /**
         * Create an inspection for each turbine and grade it's components.
         */
        $windFarm->turbines->each(function (Turbine $turbine, int $key) {
            $inspection = $turbine->inspections()->save(Inspection::factory()->make());

            $turbine->components->each(function (Component $component) use ($inspection) {
                InspectionComponent::factory()
                    ->forComponent($component)
                    ->forInspection($inspection)
                    ->randomGrade()
                    ->create();
            });
        });
    }

    private function windFarmAreaPolygon(): Polygon
    {
        return new Polygon([
            new LineString([
                new Point(-3.4046886, 55.9233214),
                new Point(-3.4045599, 55.9265314),
                new Point(-3.4005473, 55.9273128),
                new Point(-3.3959339, 55.9273489),
                new Point(-3.3921359, 55.9265194),
                new Point(-3.3900759, 55.9246439),
                new Point(-3.3888314, 55.9223235),
                new Point(-3.3914921, 55.9210130),
                new Point(-3.3963630, 55.9204238),
                new Point(-3.4007189, 55.9210972),
                new Point(-3.4033582, 55.9220951),
                new Point(-3.4046886, 55.9233214),
            ])
        ]);
    }
}
