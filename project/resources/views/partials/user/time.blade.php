@if (isset($data))
    <option value="12 am" {{ $data == '12 am' ? 'selected' : ''}}>12 am</option>
    <option value="01 am" {{ $data == '01 am' ? 'selected' : ''}}>01 am</option>
    <option value="02 am" {{ $data == '02 am' ? 'selected' : ''}}>02 am</option>
    <option value="03 am" {{ $data == '03 am' ? 'selected' : ''}}>03 am</option>
    <option value="04 am" {{ $data == '04 am' ? 'selected' : ''}}>04 am</option>
    <option value="05 am" {{ $data == '05 am' ? 'selected' : ''}}>05 am</option>
    <option value="06 am" {{ $data == '06 am' ? 'selected' : ''}}>06 am</option>
    <option value="07 am" {{ $data == '07 am' ? 'selected' : ''}}>07 am</option>
    <option value="08 am" {{ $data == '08 am' ? 'selected' : ''}}>08 am</option>
    <option value="09 am" {{ $data == '09 am' ? 'selected' : ''}}>09 am</option>
    <option value="10 am" {{ $data == '10 am' ? 'selected' : ''}}>10 am</option>
    <option value="11 am" {{ $data == '11 am' ? 'selected' : ''}}>11 am</option>
    <option value="12 pm" {{ $data == '12 pm' ? 'selected' : ''}}>12 pm</option>
    <option value="01 pm" {{ $data == '01 pm' ? 'selected' : ''}}>01 pm</option>
    <option value="02 pm" {{ $data == '02 pm' ? 'selected' : ''}}>02 pm</option>
    <option value="03 pm" {{ $data == '03 pm' ? 'selected' : ''}}>03 pm</option>
    <option value="04 pm" {{ $data == '04 pm' ? 'selected' : ''}}>04 pm</option>
    <option value="05 pm" {{ $data == '05 pm' ? 'selected' : ''}}>05 pm</option>
    <option value="06 pm" {{ $data == '06 pm' ? 'selected' : ''}}>06 pm</option>
    <option value="07 pm" {{ $data == '07 pm' ? 'selected' : ''}}>07 pm</option>
    <option value="08 pm" {{ $data == '08 pm' ? 'selected' : ''}}>08 pm</option>
    <option value="09 pm" {{ $data == '09 pm' ? 'selected' : ''}}>09 pm</option>
    <option value="10 pm" {{ $data == '10 pm' ? 'selected' : ''}}>10 pm</option>
    <option value="11 pm" {{ $data == '11 pm' ? 'selected' : ''}}>11 pm</option>
    <option value="closed" {{ $data == 'closed' ? 'selected' : ''}}>Closed</option>
@else
    <option value="12 am">12 am</option>
    <option value="01 am">01 am</option>
    <option value="02 am">02 am</option>
    <option value="03 am">03 am</option>
    <option value="04 am">04 am</option>
    <option value="05 am">05 am</option>
    <option value="06 am">06 am</option>
    <option value="07 am">07 am</option>
    <option value="08 am">08 am</option>
    <option value="09 am">09 am</option>
    <option value="10 am">10 am</option>
    <option value="11 am">11 am</option>
    <option value="12 pm">12 pm</option>
    <option value="01 pm">01 pm</option>
    <option value="02 pm">02 pm</option>
    <option value="03 pm">03 pm</option>
    <option value="04 pm">04 pm</option>
    <option value="05 pm">05 pm</option>
    <option value="06 pm">06 pm</option>
    <option value="07 pm">07 pm</option>
    <option value="08 pm">08 pm</option>
    <option value="09 pm">09 pm</option>
    <option value="10 pm">10 pm</option>
    <option value="11 pm">11 pm</option>
    <option value="closed">Closed</option>
@endif
