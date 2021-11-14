<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Setting extends Model
{
    use HasFactory;

    protected $table = 'settings';
    

    public $set;

    public $writeLow;
    public $writeLowMid;
    public $writeHighMid;
    public $writeHigh;

    public $practiceLow;
    public $practiceLowMid;
    public $practiceHighMid;
    public $practiceHigh;

    public $graduateLow;
    public $graduateHighMid;
    public $graduateLowMid;
    public $graduateHigh;

    public function __construct()
    {
        $this->set = DB::table('settings')->where('id', 1)->first();
        $set = $this->set;

        $this->writeLow = $set->write_low;
        $this->writeLowMid = $set->write_low_mid;
        $this->writeHighMid = $set->write_high_mid;
        $this->writeHigh = $set->write_high;
        $this->practiceLow = $set->practice_low;
        $this->practiceLowMid = $set->practice_low_mid;
        $this->practiceHighMid = $set->practice_high_mid;
        $this->practiceHigh = $set->practice_high;

        $this->graduateLow = $set->graduate_low;
        $this->graduateHighMid = $set->graduate_high_mid;
        $this->graduateLowMid = $set->graduate_low_mid;
        $this->graduateHigh = $set->graduate_high;
    }

    public function WriteLow($write)
    {
        $x = -1;
        if ($write <= $this->writeLow) $x = 1;
        else if ($write >= $this->writeLow && $write <= $this->writeLowMid) $x = ($this->writeLowMid - $write) / ($this->writeLowMid - $this->writeLow);
        else if ($write >= $this->writeLowMid) $x = 0;
        return $x;
    }

    public function WriteMid($write)
    {
        $x = -1;
        if ($write <= $this->writeLow || $write >= $this->writeHigh) $x = 0;
        else if ($write >= $this->writeLow && $write <= $this->writeLowMid) $x = ($write - $this->writeLow) / ($this->writeLowMid - $this->writeLow);
        else if ($write >= $this->writeHighMid && $write <= $this->writeHigh) $x = ($this->writeHigh - $write) / ($this->writeHigh - $this->writeHighMid);
        else if ($write > $this->writeLowMid || $write < $this->writeHighMid) $x = 1;
        return $x;
    }

    public function WriteHigh($write)
    {
        $x = -1;
        if ($write <= $this->writeHighMid) $x = 0;
        else if ($write >= $this->writeHighMid && $write <= $this->writeHigh) $x = ($write - $this->writeHighMid) / ($this->writeHigh - $this->writeHighMid);
        else if ($write >= $this->writeHigh) $x = 1;
        return $x;
    }

    public function PracticeLow($practice)
    {
        $x = -1;
        if ($practice <= $this->practiceLow) $x = 1;
        else if ($practice >= $this->practiceLow && $practice <= $this->practiceLowMid) $x = ($this->practiceLowMid - $practice) / ($this->practiceLowMid - $this->practiceLow);
        else if ($practice >= $this->practiceLowMid) $x = 0;
        return $x;
    }

    public function PracticeMid($practice)
    {
        $x = -1;
        if ($practice <= $this->practiceLow || $practice >= $this->practiceHigh) $x = 0;
        else if ($practice >= $this->practiceLow && $practice <= $this->practiceLowMid) $x = ($practice - $this->practiceLow) / ($this->practiceLowMid - $this->practiceLow);
        else if ($practice >= $this->practiceHighMid && $practice <= $this->practiceHigh) $x = ($this->practiceHigh - $practice) / ($this->practiceHigh - $this->practiceHighMid);
        else if ($practice > $this->practiceLowMid || $practice < $this->practiceHighMid) $x = 1;
        return $x;
    }

    public function PracticeHigh($practice)
    {
        $x = -1;
        if ($practice <= $this->practiceHighMid) $x = 0;
        else if ($practice >= $this->practiceHighMid && $practice <= $this->practiceHigh) $x = ($practice - $this->practiceHighMid) / ($this->practiceHigh - $this->practiceHighMid);
        else if ($practice >= $this->practiceHigh) $x = 1;
        return $x;
    }

    public function WriteLowDisjunction($writeLowConjunction, $practiceLowConjunction)
    {
        $x = -1;
        if ($writeLowConjunction < $practiceLowConjunction) $x = $writeLowConjunction;
        else if ($writeLowConjunction >= $practiceLowConjunction) $x = $practiceLowConjunction;
        return $x;
    }

    public function PracticeMidDisjunction($writeLowConjunction, $practiceMidConjunction)
    {
        $x = -1;
        if ($writeLowConjunction < $practiceMidConjunction) $x = $writeLowConjunction;
        else if ($writeLowConjunction >= $practiceMidConjunction) $x = $practiceMidConjunction;
        return $x;
    }

    public function PracticeLowDisjunction($writeMidConjunction, $practiceLowConjunction)
    {
        $x = -1;
        if ($writeMidConjunction < $practiceLowConjunction) $x = $writeMidConjunction;
        else if ($writeMidConjunction >= $practiceLowConjunction) $x = $practiceLowConjunction;
        return $x;
    }

    public function WriteMidDisjunction($writeMidConjunction, $practiceMidConjunction)
    {
        $x = -1;
        if ($writeMidConjunction < $practiceMidConjunction) $x = $writeMidConjunction;
        else if ($writeMidConjunction >= $practiceMidConjunction) $x = $practiceMidConjunction;
        return $x;
    }

    public function GraduateNot($disjunction1, $disjunction3)
    {
        $x = -1;
        if ($disjunction1 > $disjunction3) $x = $disjunction1;
        else if ($disjunction1 <= $disjunction3) $x = $disjunction3;
        return $x;
    }

    public function GraduateYes($disjunction2, $disjunction4)
    {
        $x = -1;
        if ($disjunction2 > $disjunction4) $x = $disjunction2;
        else if ($disjunction2 <= $disjunction4) $x = $disjunction4;
        return $x;
    }

    public function GraduateFinal($defuzzyfication, $graduateLowMid)
    {
        $x = "Not Found!";
        if ($defuzzyfication <= $graduateLowMid) $x = $this->set->graduate_not;
        else if ($defuzzyfication > $graduateLowMid) $x = $this->set->graduate_yes;
        return strtoupper($x);
    }
}
