<?php

namespace App\Services\Finance;

class EmiEngine
{
    /**
     * Calculate Flat Interest EMI
     * Monthly ROI = (Principal * Rate * Months / 12) / 100
     */
    public static function calculateFlatEmi($principal, $rate, $tenure)
    {
        $interestPerMonth = ($principal * ($rate / 100) * ($tenure / 12)) / $tenure;
        $principalPerMonth = $principal / $tenure;
        $emi = $principalPerMonth + $interestPerMonth;

        return [
            'emi' => round($emi, 2),
            'total_payable' => round($emi * $tenure, 2),
            'interest_component' => round($interestPerMonth, 2),
            'principal_component' => round($principalPerMonth, 2),
        ];
    }

    /**
     * Calculate Reducing Balance EMI
     * E = P x r x (1+r)^n / ((1+r)^n - 1)
     */
    public static function calculateReducingEmi($principal, $rate, $tenure)
    {
        $r = ($rate / 100) / 12; // Monthly rate
        $n = $tenure; // Number of months

        $emi = ($principal * $r * pow(1 + $r, $n)) / (pow(1 + $r, $n) - 1);

        return [
            'emi' => round($emi, 2),
            'total_payable' => round($emi * $tenure, 2),
        ];
    }

    /**
     * Generate Amortization Schedule
     */
    public static function generateSchedule($principal, $rate, $tenure, $type = 'flat', $startDate = null)
    {
        $schedule = [];
        $date = $startDate ? \Carbon\Carbon::parse($startDate) : \Carbon\Carbon::now();
        
        $emiData = ($type === 'flat') 
            ? self::calculateFlatEmi($principal, $rate, $tenure)
            : self::calculateReducingEmi($principal, $rate, $tenure);
            
        $remainingPrincipal = $principal;
        $monthlyRate = ($rate / 100) / 12;

        for ($i = 1; $i <= $tenure; $i++) {
            if ($type === 'reducing') {
                $interest = $remainingPrincipal * $monthlyRate;
                $principalComponent = $emiData['emi'] - $interest;
                $remainingPrincipal -= $principalComponent;
            } else {
                $interest = $emiData['interest_component'];
                $principalComponent = $emiData['principal_component'];
            }

            $schedule[] = [
                'installment_no' => $i,
                'due_date' => $date->addMonth()->toDateString(),
                'amount' => $emiData['emi'],
                'principal' => round($principalComponent, 2),
                'interest' => round($interest, 2),
            ];
        }

        return $schedule;
    }
}
