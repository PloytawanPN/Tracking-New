@extends('Pets.Layout')
@section('style')
    <style>
        .card-form {
            width: 100%;
            max-width: 450px;
            min-height: 20px;
            padding: 20px;
            padding-top: 30px;
            background-color: white;
            border-radius: 5px;
            margin: auto;
            box-shadow: rgba(88, 88, 88, 0.35) 0px 5px 15px;
            margin-top: 20px;
            text-align: center;
            display: flex;
            flex-direction: column;
        }

        .header {
            font-size: 27px;
            font-weight: 700;
            background: linear-gradient(45deg, #051937, #004D7A, #008793, #00BF72, #ABEB12);
            background-clip: text;
            color: transparent;
        }

        .frame-preview {
            width: 120px;
            height: 120px;
            margin: auto;
            border-radius: 50%;
            cursor: pointer;
            background-color: rgb(235, 235, 235);
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 10px;
            position: relative;
        }

        .frame-preview i {
            font-size: 60px;
            color: white;
            position: absolute;
            z-index: 0;
        }

        .preview-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: none;
            position: absolute;
            z-index: 1;
        }

        .input-group {
            text-align: start;
            width: 100%;
            display: flex;
            flex-direction: column;
        }

        .input-group label {
            color: #585858;
            font-size: 15px;
            margin-bottom: 5px;
        }

        .input-field {
            padding: 8px 10px;
            border: none;
            outline: solid 1px #cccccc;
            border-radius: 5px;
            color: #2c2c2c;
        }


        .mt-1 {
            margin-top: 10px;
        }

        .button-class {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
            margin-bottom: 10px;
        }

        .button-class button {
            font-size: 16px;
            width: 85px;
            height: 35px;
            background: linear-gradient(45deg, #004D7A, #008793, #00BF72, #ABEB12);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: all ease 0.3s;
        }

        .button-class button:hover {
            transform: scale(1.05);
        }
    </style>
@section('title')
    Register Pet
@endsection
@endsection
@section('content')
<livewire:pets.first-regster />
@endsection
