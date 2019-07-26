@component('mail::message')
Dear {{$user->firstName}} {{$user->lastName}},
<p>
    Your purchase of (class title) has now been confirmed.
</p>
<p>To enrol your learners you will need to give them the following link and code:</p>
<b>Link:</b> <a href="{{route('login')}}" target="_blank"> {{route('login')}}</a>

<b><u>Course Title :</u></b><br>
<b>Access Code:</b> GHGGHG124GH <br>
<p>
    All learners will need to be registered before they can attend the course, any learner arriving on the day of the
    course that is not registered will not be granted access. </p>
<p>
    The learners will be asked to complete certain information, this information is essential to process their
    certificate so please make sure this is completed accurately.
</p>
<p style="color:red;">
    (add a section in here about the commissioner being able to make changes to learners)
</p>

<p>
    Owing to the amount of information given in the training, it is essential that the learners arrive promptly to the
    course. The trainer will reserve the right to turn away any learner arriving more than 30 minutes late to the course
    and no refund will be given.
</p>


<p>
    The learner will have some assessment requirements to pass this course. The learners may be required to complete
    some of these assessments before or after the course, failure to submit these assessments within the given timeframe
    with automatically fail the learner and they will need to attend another course (fees apply). Please ensure your
    learners are aware of this before agreeing to attend the course.
</p>


<p>As the course coordinator, you will be able to log into the learning portal at https://training.dlf.org.uk and see
    the following information:</p>
<ul>
    <li>Learners registered to attend the course </li>
    <li>Learners that attended the course</li>
    <li>Learners assignments including marker comments</li>
    <li>Learners final mark </li>
    <li>Certificate posting and tracking information</li>
</ul>

<p>
    If you have any difficulties or questions in the meantime, please contact the training department on 020 7432 8010
    or <a href="mailto:training@dlf.org.uk">training@dlf.org.uk</a> .
</p>

Kind regards,<br>
DLF Training

@endcomponent
