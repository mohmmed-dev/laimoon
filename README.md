Laimoon Academic

# Laimoon Academic
موقع ويب بسيط يتيح بيع وشراء الكورسات مع لوحة تحكم للمشرفين و المعلمين 
‏ 12 laravel 

## كيف تبداء

تحميل الحزم عن طريق 
`composer install `

تحميل حزم جافا سكريبت عن طريق 
`npm install `

 ثم تهجير قاعدة البيانات
`php artisan migrate`

 ثم بذر المحتوى في قاعدة البيانات
`php artisan db:seed seeder`

 ### الان تحتاج الي ضبط stripe لعمليات الدفع و الاشتراكات 

STRIPE_KEY=your-"stripe-key"
STRIPE_SECRET=your-"stripe-secret"
STRIPE_WEBHOOK_SECRET=your-"stripe-webhook-secret"

 ### ضع خطط الاشتراك
 min_subscription_type = "??"
first_subscription = "??"
second_subscription = "??"
third_subscription = "??"

### الان شغل 
 
`npm run dev `

`stripe listen --forward-to http://laimoon.test/stripe/webhook`

###   لتحميل الدروس

`php artisan queue:work`

