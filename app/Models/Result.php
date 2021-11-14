<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $table = 'results';

    protected $fillable = [
        'nip',
        'test_write',
        'test_practice',
        'defuzzy',
        'graduate'
    ];


    public $set;

    //Level
    public $writeLowLevel;
    public $writeMidLevel;
    public $writeHighLevel;
    public $practiceLowLevel;
    public $practiceMidLevel;
    public $practiceHighLevel;

    //Conjunction
    public $writeLowConjunction;
    public $writeMidConjunction;
    public $practiceLowConjunction;
    public $practiceMidConjunction;

    //Disjunction
    public $writeLowDisjunction;
    public $writeMidDisjunction;
    public $practiceLowDisjunction;
    public $practiceMidDisjunction;

    //Defuzzyfication
    public $graduateNot;
    public $graduateYes;
    public $defuzzyfication;

    //Final
    public $graduateFinal;


    public function __construct($write = null, $practice = null)
    {
        $this->set = new Setting();

        $this->LevelFuzzy($write, $practice);
        $this->ConjunctionFuzzy();
        $this->DisjunctionFuzzy();
        $this->DefuzzyficationFuzzy();
    }

    public function LevelFuzzy($write, $practice)
    {
        $this->writeLowLevel = round($this->set->WriteLow($write), 2);
        $this->writeMidLevel = round($this->set->WriteMid($write), 2);
        $this->writeHighLevel = round($this->set->WriteHigh($write), 2);
        $this->practiceLowLevel = round($this->set->PracticeLow($practice), 2);
        $this->practiceMidLevel = round($this->set->PracticeMid($practice), 2);
        $this->practiceHighLevel = round($this->set->PracticeHigh($practice), 2);
    }

    public function ConjunctionFuzzy()
    {
        $this->writeLowConjunction = $this->writeLowLevel;
        $this->writeMidConjunction = $this->writeMidLevel;
        $this->practiceLowConjunction = $this->practiceLowLevel;
        $this->practiceMidConjunction = $this->practiceMidLevel;
    }

    public function DisjunctionFuzzy()
    {
        $this->writeLowDisjunction = $this->set->WriteLowDisjunction($this->writeLowConjunction, $this->practiceLowConjunction);
        $this->practiceMidDisjunction = $this->set->PracticeMidDisjunction($this->writeLowConjunction, $this->practiceMidConjunction);
        $this->practiceLowDisjunction = $this->set->PracticeLowDisjunction($this->writeMidConjunction, $this->practiceLowConjunction);
        $this->writeMidDisjunction = $this->set->WriteMidDisjunction($this->writeMidConjunction, $this->practiceMidConjunction);
    }

    public function DefuzzyficationFuzzy()
    {
        $node1 = $this->set->graduateLow;
        $node2 = $this->set->graduateLow + (($this->set->graduateHighMid - $this->set->graduateLow) / 2);
        $node3 = $this->set->graduateHighMid;
        $node4 = $this->set->graduateHighMid + (($this->set->graduateLowMid - $this->set->graduateHighMid) / 2);
        $node5 = $this->set->graduateLowMid;
        $node6 = $this->set->graduateLowMid + (($this->set->graduateHigh - $this->set->graduateLowMid) / 2);
        $node7 = $this->set->graduateHigh;
        
        $this->graduateNot = $this->set->GraduateNot($this->writeLowDisjunction, $this->practiceLowDisjunction);
        $this->graduateYes = $this->set->GraduateYes($this->practiceMidDisjunction, $this->writeMidDisjunction); 
        $nodes = (($node1 + $node2 + $node3 + $node4) * $this->graduateNot) + (($node5 + $node6 + $node7) * $this->graduateYes);
        $nodesAll = ($this->graduateNot * 4) + ($this->graduateYes * 3);
        $this->defuzzyfication = ($nodes == 0 && $nodesAll == 0) ? 75.5 : round($nodes / $nodesAll, 2);
        $this->graduateFinal = $this->set->GraduateFinal($this->defuzzyfication, $this->set->graduateLowMid);
    }
}
