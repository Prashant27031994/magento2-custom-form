Get Booking form using below URL

https://magento247.com/customerrecord/index/booking/

Example Graphql query to get data using email(post)

{
    getRecordByEmail(email: "example@test.com") {
        record_id
        name
        email
        country
    }
}

Example Rest API to get data using email(GET)

https://magento247.com/rest/V1/customerrecord/email/example@tester.com
