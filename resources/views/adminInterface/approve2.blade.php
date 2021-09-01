@extends('layouts.admin')

@section('content')
<script>
    window.onload = function() {
     if(!window.location.hash) {
         window.location = window.location + '#loaded';
         window.location.reload();
     }
 }
</script>
    <div class="vue-register">
        <div class="vue-container">
            <div class="vue-card">
                <h2>อนุมัติรายชื่อผู้สมัคร มัธยมปลาย</h2>

                <p class="suggest">ค้นหาจากเลขประจำตัวผู้สมัคร หรือ เลขบัตรประชาชน หรือ ชื่อจริง</p>
                <form class="article-search"  method="GET" action="{{ route('searchapprove2') }}">
                    @csrf
                    <input class="search" type="search" name="value" placeholder="ค้นหาจากเลขประจำตัวผู้สมัคร หรือ เลขบัตรประชาชน หรือ ชื่อจริง">
                    <i class="fas fa-search"></i>
                    <button>ค้นหา</button>
                </form>

                <div class="table">
                    <div class="tr">
                        <div class="th">รหัสสมัครสอบ</div>
                        <div class="th">ชื่อ-สกุล</div>
                        <div class="th">โรงเรียนเดิม</div>
                        <div class="th">รอการอนุมัติ</div>
                    </div>
                    {{-- ---------------------------------------------------------- --}}
                    @foreach ($studentfours as $studentfour)
                    @php $id = $studentfour->id ; @endphp
                    <div class="tr">
                        <div class="td"><p>รหัสสมัครสอบ</p> {{ $studentfour->student_id }}</div>
                        <div class="td">{{ $studentfour->tname }}{{ $studentfour->fname }}  {{ $studentfour->lname }}</div>
                        <div class="td"><p>โรงเรียนเดิม</p>{{ $studentfour->name_school }} </div>
                        <div class="td"><p>สถานะการสมัคร</p><a href="{{route('check_user2', $id)}}">ตรวจเอกสาร</a></div>
                    </div> 
                    @endforeach
                </div>

                

            </div>
        </div>
    </div>
@endsection