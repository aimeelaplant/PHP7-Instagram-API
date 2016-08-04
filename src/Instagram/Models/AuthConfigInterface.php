<?php
/**
 * Created by IntelliJ IDEA.
 * User: Aimee LaPlant
 * Date: 7/28/16
 * Time: 2:09 PM
 */
namespace laplant\Instagram\Models;

interface ClientConfigInterface
{
    public function getClientId(): string;
    public function getAccessToken() : string;
//    public function getClientSecret() : string;
    
}