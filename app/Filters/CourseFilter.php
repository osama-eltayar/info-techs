<?php


namespace App\Filters;


use Filter\Filter;
use Illuminate\Support\Facades\Auth;

class CourseFilter extends Filter
{

    public function filterTitle( $title )
    {
        $this->query->where('title', 'like', "%$title%");
    }

    public function filterSpeciality( $speciality )
    {
        $this->query->whereHas('specialities', function ( $q ) use ( $speciality ) {
            return $q->whereIn('specialities.id', [ $speciality ]);
        });
    }

    public function filterType( $type )
    {
        $this->query->where('type_id', "$type");
    }

    public function filterWithCme( $with_cme )
    {
        $this->query->where('cme_count', '>', 0);
    }

    public function filterFree( $free )
    {
        $this->query->where('price', 0);
    }

    public function filterPastEvents( $past_events )
    {
        $this->query->whereDate('end_date', '<', now());
    }

    public function filterUpcomingEvents( $past_events )
    {
        $this->query->whereDate('start_date', '>', now());
    }

    public function filterMySpeciality( $my_speciality )
    {
        $this->filterSpeciality(Auth::user()->profile->speciality_id);
    }
    public function filterFavorites()
    {
        $this->query->whereIn('id',Auth::user()->favouriteCourses()->pluck('courses.id'));
    }

    public function filterMyEvents()
    {
        $this->query->whereHas('registeredUsers',function ($q){
            return $q->where('users.id',Auth::user()->id);
        });
    }

}
