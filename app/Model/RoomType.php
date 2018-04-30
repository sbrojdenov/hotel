<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    protected $table = 'room_types';

    protected $fillable = ['name', 'cost_per_day', 'size', 'max_adult', 'max_child', 'description', 'room_service', 'status'];

    public function images()
    {
        return $this->hasMany('App\Model\Image');
    }

    public function rooms()
    {
        return $this->hasMany('App\Model\Room');
    }

    public function facilities()
    {
        return $this->belongsToMany('App\Model\Facility', 'facility_room_type')->withTimestamps();
    }

    public function getRatingsCount(){
        $rating_count = 0;
        foreach($this->rooms as $room){
            foreach($room->reviews as $review){
                if($review->approval_status == 'approved'){
                    $rating_count++;
                }
            }
        }
        return $rating_count;
    }

    public function getAggregatedRating(){
        $total_rating = 0;
        $rating_count = 0;
        foreach($this->rooms as $room){
            foreach($room->reviews as $review){
                if($review->approval_status == 'approved'){
                    $total_rating = $total_rating+$review->rating;
                    $rating_count++;
                }
            }
        }

        if($total_rating > 0 && $rating_count > 0){
            return $total_rating/$rating_count;
        } else{
            return 0;
        }
    }

}
