<?php

function getSetting($settingname = 'sitename'){
    return \App\SiteSetting::where('namesetting',$settingname)->get()[0]->value;
}
function checkIfImageIsExist($imageName = '',  $pathImage = '/public/website/bu_images/', $url = '/website/bu_images/'){
    if($imageName != ''){
        $path = base_path().$pathImage.$imageName;
        if(file_exists($path)){
            return Request::root().$url.$imageName;
        }
    }else{
        return getSetting('no_image');
    }
}

function uploadImage($buRequest, $path = '/public/website/bu_images/', $width = 500, $hight = 362 ,$deleteFileWithName=''){
    $dim = getimagesize($buRequest);

    $fileName = $buRequest->getClientOriginalName();
    $buRequest->move(base_path($path), $fileName);
    if($width = 500 && $hight = 362){
        $thumbPath = base_path('/public/website/thumb/');
        $thumbPathNew = $thumbPath.$fileName;
        Intervention\Image\Facades\Image::make(base_path($path).'/'.$fileName)->resize('800','800')->save($thumbPathNew,100);
        if($deleteFileWithName !=''){
            deleteImage($thumbPath .$deleteFileWithName);
        }
    }
    if($deleteFileWithName !=''){
        deleteImage(base_path($path .$deleteFileWithName));
    }
    return $fileName;
}
function deleteImage($deleteFileWithName){
    if(file_exists($deleteFileWithName)){
        \Illuminate\Support\Facades\File::delete($deleteFileWithName);
    }
}
function bu_type(){
    $array =[
        '' =>'Building Type',
      'flat',
      'villa',
      'Chalet'
    ];
    return $array;
}
function bu_rent(){
    $array =[
        '' =>'Select operation',
        'Sale ',
        'Rent ',
    ];
    return $array;
}
function status(){
    $array =[
        'NotActive ',
        'Active ',
    ];
    return $array;
}
function roomnumber(){
    $array =['' =>'No Of Rooms'];
    for($i = 2 ; $i<=20; $i++){
        $array[$i]=$i;
    }
    return $array;
}
function bu_place(){
    $array = [''=>'Select Place',
    'tanta',
    'cairo',
    'alex',
    '6 october'];
    return $array;
}
function searchnameFiled(){
    return [
        'bu_price'=>'Price',
        'bu_place'=>'Place',
        'rooms'=>'Rooms',
        'bu_type'=>'Building Type',
        'bu_rent'=>'Operation Type',
        'bu_square'=>'Area',
        'bu_price_from' =>'Price From',
        'bu_price_to'=>'Price To'
    ];
}

function contact(){
    $array = [
        '1'=>'Like',
        '2'=>'Problem',
        '3'=>'Suggestions',
        '4'=>'َQuestion'];
    return $array;
}

function UnreadMessage(){
    return \App\ContactUs::where('view',0)->get();
}
function CountUnreadMessage(){
    return \App\ContactUs::where('view',0)->count();
}