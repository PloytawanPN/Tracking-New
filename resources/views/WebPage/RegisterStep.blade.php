@extends('Pets.Layout.Layout')
@section('style')
    <style>
        .step-card {
            min-height: 100px;
            background-color: rgb(255, 255, 255);
            border-radius: 10px;
            margin: auto;
            width: calc(100% - 40px);
            max-width: 1000px;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
            position: relative;
            text-align: center;
            padding-bottom: 30px;
            margin-top: 30px;
        }

        .circle-icon {
            background: linear-gradient(45deg, #051937, #004D7A, #008793, #00BF72, #00BF72);
            width: 80px;
            height: 80px;
            border-radius: 50%;
            position: absolute;
            top: -40px;
            left: 50%;
            margin: 0 0 0 -37px;
            display: flex;
            justify-content: center;
            align-items: center;

        }

        .circle-icon i {
            font-size: 50px;
            font-weight: 200;
            color: white;
        }

        .top_head {
            padding-top: 60px;
        }

        .top_head p {
            font-size: 16px;
            margin: 20px 20px;
            color: rgb(99, 99, 99);
        }

        .arrow-icon {
            margin: auto;
            font-size: 50px;
            margin: 20px 0;
            color: #cccccc;
        }

        .topic-header {
            text-align: center;
            margin: 80px auto;
            max-width: 1000px;
            width: calc(100% - 40px);
    
        }
        .topic-header p{
            color: rgb(121, 121, 121);
        }

        .topic-header .header {
            font-size: 40px;
        }

        @media only screen and (max-width: 630px) {
            .topic-header {
                text-align: center;
                margin: 30px 20px;

            }

            .topic-header .header {
                font-size: 30px;
            }

            .top_head .header {
                font-size: 20px;
            }
        }
    </style>
@endsection
@section('title')
    Register Step
@endsection
@section('content')
    <div class="topic-header">
        <label class="header">{{__('messages.Registration_Process')}}</label>
        <p>{{__('messages.Registration_Process_detail')}}</p>
    </div>
    <div style="padding-top: 20px;margin-bottom: 50px;text-align: center">
        <div class="step-card">
            <div class="circle-icon">
                <i class='bx bx-shopping-bag'></i>
            </div>
            <div class="top_head">
                <label class="header ">
                    {{__('messages.step1.title')}}
                </label>
                <p>{{__('messages.step1.description')}}</p>
            </div>
        </div>

        <i class='bx bxs-down-arrow arrow-icon'></i>

        <div class="step-card">
            <div class="circle-icon">
                <i class='bx bx-registered' ></i>
            </div>
            <div class="top_head">
                <label class="header ">
                    {{__('messages.step2.title')}}
                </label>
                <p>{{__('messages.step2.description')}}</p>
            </div>
        </div>

        <i class='bx bxs-down-arrow arrow-icon'></i>

        <div class="step-card">
            <div class="circle-icon">
                <i class='bx bx-log-in'></i>
            </div>
            <div class="top_head">
                <label class="header ">
                    {{__('messages.step3.title')}}
                </label>
                <p>{{__('messages.step3.description')}}</p>
            </div>
        </div>

        <i class='bx bxs-down-arrow arrow-icon'></i>

        <div class="step-card">
            <div class="circle-icon">
                <i class='bx bx-scan'></i>
            </div>
            <div class="top_head">
                <label class="header">
                    {{__('messages.step4.title')}}
                </label>
                <p>{{__('messages.step4.description')}}</p>
            </div>
        </div>
    </div>
@endsection
