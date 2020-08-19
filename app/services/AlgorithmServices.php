<?php
/**
 *
 * 算法学习
 * Created by PhpStorm.
 * User: chuyuejun
 * Date: 2019/9/26
 * Time: 07:10
 */
namespace app\services;

class AlgorithmServices
{


     /*
      * ①最大连续子数组
      *
      * 给定一个数组A[0, ..., n-1], 求A的连续子数组, 使得该子数组的合最大
      *
      * 例如:
      * 数组  1 ,-2 ,3 ,10, -4, 7, 2, -5
      *
      * 最大子数组  3, 10, -4, 7, 2
      *
      * 解法 ① 暴力法 ② 分治法 ③ 分析法 ④ 动态规划法
      */

     /*
      * 暴力法
      * 直接求解 A[i , j ]  的值
      * 0 <= i < n
      * i <= j < n
      * i, i+1 ,...,j-1 ,j的最大长度为 n
      * 因此 时间复杂度是 O(n^3)
      *
      */
     public function maxSubArray($A, $n)
     {
         $maxSum = $A[0];
         $newA = [];

         for ($i = 0; $i < $n ; $i++)
         {
             for ($j = $i; $j < $n; $j++)
             {
                 $currSum = 0;
                 for ($k = $i; $k <= $j; $k++)
                 {
                     $currSum += $A[$k];
                 }
                 if ($currSum > $maxSum )
                 {
                     $maxSum = $currSum;
                 }
             }
         }
         return $maxSum;
     }

































}