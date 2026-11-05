 <div class="container-fluid booking py-5" id="trip-planner">
        <div class="container py-5">
            <div class="row g-5 align-items-center">

                <div class="col-lg-12">
                    <h1 class="text-white mb-3">Plan Your Trip</h1>
                    <p class="text-white mb-4">Specify how you want your trip to be by filling this form and send it!</p>
                    <form>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control bg-white border-0" id="name"
                                        placeholder="Your Name">
                                    <label for="name">Your Full Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control bg-white border-0" id="email"
                                        placeholder="Your Email">
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating date" id="date3" data-target-input="nearest">
                                    <input type="date" class="form-control bg-white border-0" id="datetime"
                                        placeholder="Date & Time" data-target="#date3" data-toggle="datetimepicker" />
                                    <label for="datetime">Travel Date Expected</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" min="1" max="100"
                                        class="form-control bg-white border-0" id="datetime" placeholder="numeric"
                                        data-target="#date3" data-toggle="datetimepicker" />
                                    <label for="SelectPerson">Days Expected To Stay</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select bg-white border-0" id="select1">
                                        <option value="1">-- Select --</option>
                                        <option value="1">Serengeti National Park</option>
                                        <option value="2">Tarangire National Park</option>
                                        <option value="3">Lake Manyara National Park</option>
                                        <option value="3">Ruaha National Park</option>
                                        <option value="3">Katavi National Park</option>
                                        <option value="3">Mikumi National Park</option>
                                        <option value="3">Udzungwa Mountains National Park</option>
                                        <option value="3">Saadani National Park</option>
                                        <option value="3">Gombe National Park</option>
                                        <option value="3">Kitulo National Park</option>
                                        <option value="3">Climbing Mt. Kilimanjaro</option>
                                    </select>
                                    <label for="select1">Destination</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select bg-white border-0" id="select1">
                                        <option value="1">-- Select --</option>
                                        <option value="1">Budget</option>
                                        <option value="1">Mid-range</option>
                                        <option value="2">Luxury</option>
                                    </select>
                                    <label for="select1">Bugdet Level</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" min="1" max="100"
                                        class="form-control bg-white border-0" id="datetime" placeholder="numeric"
                                        data-target="#date3" data-toggle="datetimepicker" />
                                    <label for="SelectPerson">No of Adults</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" min="1" max="100"
                                        class="form-control bg-white border-0" id="datetime" placeholder="numeric"
                                        data-target="#date3" data-toggle="datetimepicker" />
                                    <label for="SelectPerson">No of Kids</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select bg-white border-0" id="select1">
                                        <option value="1">-- Select --</option>
                                        <option value="1">Camping</option>
                                        <option value="1">Lodges</option>
                                        <option value="2">5* Hotels</option>
                                        <option value="2">4* Hotels</option>
                                        <option value="2">AirBnB</option>
                                        <option value="2">Farm House</option>


                                    </select>
                                    <label for="select1">Accomodation</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control bg-white border-0" placeholder="Special Request" id="message" style="height: 100px"></textarea>
                                    <label for="message">Special Request</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-primary text-white w-100 py-3" type="submit">Send Via
                                    WhatsApp</button>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-primary text-white w-100 py-3" type="submit">Send Via
                                    Email</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
