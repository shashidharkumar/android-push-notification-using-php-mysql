# Android mobile app push notifications using FCM, PHP and MySQL
How to send notification to android mobile app using Firebase and php & mysql.<br> 
Android Push Notifications using Firebase Cloud Messaging (FCM) and PHP & MySQL<br>
send notification to android mobile app using Firebase and php & mysql<br>
How to send notification to android mobile app using Firebase and php & mysql?<br>
Author: Shashi Dhar Kumar<br>
Author URI: https://www.shashidharkumar.in<br>
Plugin URL: https://www.shashidharkumar.com<br>


# How to achieve this?
1. Copy the below code to create your table in database<br>

-- Table structure for table `registeruser`--
CREATE TABLE `registeruser` (
  `id` int(11) NOT NULL,
  `mobile` int(11) NOT NULL,
  `mobiletoken` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Indexes for table `registeruser`--

ALTER TABLE `registeruser`
  ADD PRIMARY KEY (`id`);

-- AUTO_INCREMENT for table `registeruser`--

ALTER TABLE `registeruser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
	
2. Register few mobile devices using your mobile app<br>	

3. Copy the php code or download as it is<br>

4. Change the required parameters according to your details<br>
   4.1. Update Database configuration details<br> 
   4.1. Firebase Cloud Messaging api key<br> 
   4.1. How to get Firebase Cloud Messaging API Key - Firebase Cloud Messaging api key - For this login to your firebase console and see the project setting icon just right after Project Overview and Click on Cloud Messagging tab and copy value of "Legacy server key"<br>
	 
