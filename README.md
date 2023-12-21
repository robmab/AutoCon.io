# AutoCon.io

![image](https://github.com/robmab/AutoCon.io/assets/56076087/61a62238-2520-4612-8002-d5ae36903fce)

Web dealership where you can buy BMW vehicles and their components, in addition to the administrative management of the same for ADMIN users

![AQUI](https://github.com/robmab/AutoCon.io/assets/56076087/500db336-c0d7-4cc3-9054-344cf1284390)

## Features
- **Home**, with a preview of the website with all the sections through an **interactive carousel**. There is also a section for locating the site via **GoogleMaps**.
- View **BMW vehicles**, showing their availability and price. In case of a **discount**, this is automatically reflected in a banner.
  - If you log in as **Administrator**, you will also have a preview of how many vehicles of each type are **available, as well as rented and sold vehicles**. You will also have a couple of buttons to manually **control the number of vehicles available**.
<br><img src="https://github.com/robmab/AutoCon.io/assets/56076087/98ace6d8-1d92-4a2c-87ed-c7e3ccb1f4b4" width=30% height=30%><br>
  - Each of the vehicles will have an individual view describing all the details of the vehicle, as well as the possibility to **rent or buy** the vehicle, only if you are a registered user with a registered card.
- View of **Components** available for purchase. Each type of component can be divided into different sub-types. As with vehicles, you will be able to see the discounted prices.
  - If you log in as **administrator**, you will see a button to change the view to **Component Management**, where you can add or remove components.
  <br><img src="https://github.com/robmab/AutoCon.io/assets/56076087/a0909fa8-45c1-4a8b-82be-ed3b39daf0e7" width=35% height=35%>
  <img src="https://github.com/robmab/AutoCon.io/assets/56076087/e1b20b7c-e280-4088-9ec4-2e0518c3a1ab" width=30% height=30%><br>
- **View of Services available for booking**, for registered users only.
- **Profile** where you can view/edit your **personal details**, as well as add/delete your **bank card**.
  <br><img src="https://github.com/robmab/AutoCon.io/assets/56076087/5e8a4963-6101-44f0-b184-3df219006080" width=30% height=30%><br>
- **Tracking list**, where you can see your **list of purchased/rented/reserved vehicles**, your **list of components** ordered and purchased, and your **list of booked/completed services**.
  -In all cases you can cancel at any time any product(s) booked).
-**User management system**, being able to register, login and logout

## Admin Features
As we see, if you log in as an administrator user, you will have a number of privileges in the main views. But in addition to what we have already seen, you will have a unique view accessible from the navbar.
<br><img src="https://github.com/robmab/AutoCon.io/assets/56076087/f43fff52-ce27-4ed3-b297-99382c3553b3" width=30% height=30%><br>
- **Users**: List of registered users on the site, with option to give **Adm Privileges** to any of them, in addition to personal data.
- **Suppliers**: List of suppliers' details for all products, with the possibility of **updating their availability**.
  <br><img src="https://github.com/robmab/AutoCon.io/assets/56076087/509bf106-8cb1-4132-b1d6-725cede88d9a" width=30% height=30%><br>
- **Vehicle management**: List of all purchased/reserved/rented vehicles of all users, from where you can **cancel** any reserved/rented vehicle, as well as **change it to a purchased vehicle**.
- **Discount events**: You can manage dates on which to add/edit **events with a discount that will be automatically applied to all products**, as well as the banner that will appear.
- **Components**: As with vehicles, it is possible to cancel a product reserved by a user, as well as to upgrade it to a purchased product.
- **Services**: You can both cancel and accept booked services, as well as change the status to completed.

## Responsive
This website has been designed for both desktop and tablet/mobile thanks to bootstrap.
<br><img src="https://github.com/robmab/AutoCon.io/assets/56076087/b9daec91-1369-4388-82bb-3c3fc5235054" width=20% height=20%><br>

## Technologies
-  SQLInjection Protection
> Technology made with manual PHP code to prevent hackers from using login inputs to perform unauthorised SQL operations, such as deleting users.
- Frontend & Backend
> PHP, Javascript Vanilla, CSS, Oracle SQL. No framework
