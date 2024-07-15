// MAIN JS FILE
// let rawResponse;
// let backTarget = "";

// ***************************************
// PAGE LOAD FUNCTION
// ***************************************//

function pageLoaded(data) {
	//console.log("page load set_app_dir: " + set_app_dir);
	//console.log("page load get url root: " + getURLRoot());

	const urlArr = data.document.URL.split("/");
	document.getElementById("msg-flash").value = "0";

	// ---*** TRADES - LUT_ITEM_EDIT PAGE ---***
	if (urlArr[4] == "trades" && urlArr[5] == "lut_item_edit") {
		console.log("loading the lut item edit page");
		//*** WRANGLE LUT EDIT ATTRIBUTES **/
		let rawJSON = document.getElementById("attributes_array").value;
		if (true) {
			let attribute_type = makeAttributesIntoObj(rawJSON).TYPE;
			let attribute_brand = makeAttributesIntoObj(rawJSON).BRAND;
			let attribute_color = makeAttributesIntoObj(rawJSON).COLOR;
			let attribute_focustype = makeAttributesIntoObj(rawJSON).FOCUS_TYPE;
			let attribute_mount = makeAttributesIntoObj(rawJSON).MOUNT;
			let attribute_focallength = makeAttributesIntoObj(rawJSON).FOCAL_LENGTH;
			let attribute_maximumaperture = makeAttributesIntoObj(rawJSON).MAXIMUM_APERTURE;
			let attribute_filtersize = makeAttributesIntoObj(rawJSON).FILTER_SIZE;
			let attribute_battery_array = makeAttributesIntoObj(rawJSON).BATTERY;
			let attribute_charger_array = makeAttributesIntoObj(rawJSON).CHARGER;

			//console.log("attribute_type: " + attribute_type);
			if (isEmpty(attribute_type)) {
				document.getElementById("show_attribute_type").checked = false;
				document.getElementById("attribute_type_select").classList.add("visually-hidden");
			} else {
				document.getElementById("show_attribute_type").checked = true;
				document.getElementById("attribute_type_select").classList.remove("visually-hidden");
			}

			//console.log("attribute_brand: " + attribute_brand);
			if (isEmpty(attribute_brand)) {
				document.getElementById("show_attribute_brand").checked = false;
				document.getElementById("attribute_brand_input").classList.add("visually-hidden");
			} else {
				document.getElementById("show_attribute_brand").checked = true;
				document.getElementById("attribute_brand_input").classList.remove("visually-hidden");
			}

			//console.log("attribute_color: " + attribute_color);
			if (isEmpty(attribute_color)) {
				//document.getElementById("show_attribute_color").checked = false;
				//document.getElementById("attribute_color_select").classList.add("visually-hidden");
				document.getElementById("attribute_color_select").value = "NONE";
				document.getElementById("show_attribute_color").checked = true;
			} else {
				document.getElementById("show_attribute_color").checked = true;
				//   document.getElementById("attribute_color_select").classList.remove("visually-hidden");
			}

			//console.log("attribute_focustype: " + attribute_focustype);
			if (isEmpty(attribute_focustype)) {
				document.getElementById("show_attribute_focustype").checked = false;
				document.getElementById("attribute_focustype_select").classList.add("visually-hidden");
			} else {
				document.getElementById("show_attribute_focustype").checked = true;
				document.getElementById("attribute_focustype_select").classList.remove("visually-hidden");
			}

			//console.log("attribute_mount: " + attribute_mount);
			if (isEmpty(attribute_mount)) {
				document.getElementById("show_attribute_mount").checked = false;
				document.getElementById("attribute_mount_input").classList.add("visually-hidden");
			} else {
				document.getElementById("show_attribute_mount").checked = true;
				document.getElementById("attribute_mount_input").classList.remove("visually-hidden");
			}

			//console.log("attribute_focallength: " + attribute_focallength);
			if (isEmpty(attribute_focallength)) {
				document.getElementById("show_attribute_focallength").checked = false;
				document.getElementById("attribute_focallength_input").classList.add("visually-hidden");
			} else {
				document.getElementById("show_attribute_focallength").checked = true;
				document.getElementById("attribute_focallength_input").classList.remove("visually-hidden");
			}

			//console.log("attribute_maximumaperture: " + attribute_maximumaperture);
			if (isEmpty(attribute_maximumaperture)) {
				document.getElementById("show_attribute_maximumaperture").checked = false;
				document.getElementById("attribute_maximumaperture_input").classList.add("visually-hidden");
			} else {
				document.getElementById("show_attribute_maximumaperture").checked = true;
				document.getElementById("attribute_maximumaperture_input").classList.remove("visually-hidden");
			}

			//console.log("attribute_filtersize: " + attribute_filtersize);
			if (isEmpty(attribute_filtersize)) {
				document.getElementById("show_attribute_filtersize").checked = false;
				document.getElementById("attribute_filtersize_input").classList.add("visually-hidden");
			} else {
				document.getElementById("show_attribute_filtersize").checked = true;
				document.getElementById("attribute_filtersize_input").classList.remove("visually-hidden");
			}

			//console.log("attribute_battery_array: " + attribute_battery_array);
			if (isEmpty(attribute_battery_array)) {
				document.getElementById("show_attribute_battery").checked = false;
				document.getElementById("attribute_battery_input").classList.add("visually-hidden");
			} else {
				document.getElementById("show_attribute_battery").checked = true;
				document.getElementById("attribute_battery_input").classList.remove("visually-hidden");
			}

			//console.log("attribute_charger_array: " + attribute_charger_array);
			if (isEmpty(attribute_charger_array)) {
				// console.log("uncheck show_attribute_charger");
				// console.log("hide attribute_charger_input");
				document.getElementById("show_attribute_charger").checked = false;
				document.getElementById("attribute_charger_input").classList.add("visually-hidden");
			} else {
				// console.log("check show_attribute_charger");
				// console.log("show attribute_charger_input");
				document.getElementById("show_attribute_charger").checked = true;
				document.getElementById("attribute_charger_input").classList.remove("visually-hidden");
				// show_attribute_charger
				// attribute_charger_input
			}

			const type_attr = document.getElementById("attribute_type_select").value;
			checkLensAttributeDisplay(type_attr);
			// updateAttributesInJSON("CHARGER", ["new charger a", "new charger b", "new charger C"])
		} //*** END WRANGLE LUT EDIT ATTRIBUTES **/

		//*** WRANGLE LUT EDIT CATEGORIES **/
		if (true) {
			const categories_string = document.getElementById("categories").value;
			const categories_array = categories_string.split(" > ");
			const cat_set_array = ["cat_set_a", "cat_set_b", "cat_set_c", "cat_set_da", "cat_set_db", "cat_set_fa", "cat_set_fb", "cat_set_fc", "cat_set_fd", "cat_set_g"];

			document.getElementById("category_display").value = categories_string;
			// console.log("categories string: " + categories_string);
			// console.log("categories array: " + categories_array);
			//console.log("cat_set_array: " + cat_set_array);
			for (let i = 0; i < categories_array.length; i++) {
				//console.log(cat_set_array.length);
				for (let k = 0; k < cat_set_array.length; k++) {
					let temp_options = document.getElementById(cat_set_array[k]).options;
					//console.log("temp_options[" + cat_set_array[k] + "].length: " + temp_options.length);
					for (let j = 0; j < temp_options.length; j++) {
						if (temp_options[j].innerHTML == categories_array[i]) {
							//console.log("it's a match!");
							// console.log("cat_set: " + cat_set_array[k])
							// console.log("temp_entry " + i + " : " + categories_array[i]);
							// console.log("temp_options " + j + ": " + temp_options[j].innerHTML);
							// console.log("temp_options " + j + " index: " + temp_options[j].index);
							temp_options.selectedIndex = j;
							// console.log("   ");
							//} else {
							//console.log("no match");
						}
					}
				}
			}
		} // *** END WRANGLE LUT EDIT CATEGORIES **

		updatePriceMatrix();
		// descriptionUpdate('medium_description');
		// descriptionUpdate('long_description');
		//calculateComplexPriceMatrix();
		return;
	}
	// ---*** TRADES - ADD PAGE---***
	if (urlArr[4] == "trades" && urlArr[5] == "add") {
		tradeSheetCalulateTotals();
		return;
	}
	// ---*** CUSTOMERS - INDEX PAGE---***
	// if (urlArr[4] == "customers" && urlArr[5] == "index") {
	// 	if (document.getElementById("dupe_last_name") != undefined) {
	// 		//showCustomersResult(document.getElementById("dupe_last_name").value);
	// 	} else {
	// 	}

	// 	document.getElementById("navbar_logo").style.cursor = "default";
	// 	return;
	// }
	// ---*** TRADES - TRADE_ITEM_ADD_FROM_LUT PAGE---***
	if (urlArr[4] == "trades" && urlArr[5] == "index") {
		//if (urlArr[4] == "trades" && (urlArr[5] == "post_add_lut_item_to_trade_sheet")) {
		//let posted_value = 'test';
		//  console.log("<br><br>posted value: " + posted_value + "<br><br>");
		// if (posted_value == "") {
		//   document.getElementById("cosmetic_condition_dropdown").value = "unset";
		// } else {
		//   //document.getElementById("cosmetic_condition_dropdown").value = posted_value;
		// }
		// cosmetic_condition_selected_text = document.getElementById("cosmetic_condition_selected_text").value;
		// cosmetic_condition_selected_value = document.getElementById("cosmetic_condition_selected_value").value;
		// console.log("cosmetic_condition_selected_text: " + cosmetic_condition_selected_text);
		// console.log("cosmetic_condition_selected_value: " + cosmetic_condition_selected_value);
		//   // base_value = document.getElementById('base_price_field').value;
		//   // if (base_value == 0) {
		//   // document.getElementById('missing_data_warning').classList.remove("visually-hidden");
		//   // //document.getElementById('trade_id-display').classList.add("text-danger");
		//   // document.getElementById('base_price_field').removeAttribute("disabled");
		//   // document.getElementById('base_price_field').tabIndex = "0";
		//   // document.getElementById('cosmetic_condition_dropdown').classList.add("text-info");
		//   // document.getElementById('cosmetic_condition_dropdown').classList.add("border-info");
		//   // document.getElementById('optical_condition_dropdown').classList.add("text-info");
		//   // document.getElementById('optical_condition_dropdown').classList.add("border-info");
		//   // document.getElementById('mechanical_condition_dropdown').classList.add("text-info");
		//   // document.getElementById('mechanical_condition_dropdown').classList.add("border-info");
		//   // document.getElementById('cosmetic_condition_dropdown').removeAttribute("onchange");
		//   // document.getElementById('optical_condition_dropdown').removeAttribute("onchange");
		//   // document.getElementById('mechanical_condition_dropdown').removeAttribute("onchange");
		//   // document.getElementById('cosmetic_condition_visible').value = "off";
		//   // document.getElementById('optical_condition_visible').value = "off";
		//   // document.getElementById('mechanical_condition_visible').value = "off";
		//   // }
		//   // return;
		// };
		// ---*** TRADES - LUT_ITEM_EDIT PAGE---***
		//if (urlArr[4] == "trades" && urlArr[5] == "lut_item_edit") {
		//   let medium_description_entry = document.getElementById('medium_description_entry').value;
		//   console.log("pageload -> medium_description_entry: " + medium_description_entry);
		//document.getElementById('missing_data_warning').classList.remove("visually-hidden");
		//document.getElementById('trade_id-display').classList.add("text-danger");
		//document.getElementById('base_price_field').removeAttribute("disabled");
		// document.getElementById('base_price_field').tabIndex = "0";
		// document.getElementById('cosmetic_condition_dropdown').classList.add("text-info");
		// document.getElementById('cosmetic_condition_dropdown').classList.add("border-info");
		// document.getElementById('optical_condition_dropdown').classList.add("text-info");
		// document.getElementById('optical_condition_dropdown').classList.add("border-info");
		// document.getElementById('mechanical_condition_dropdown').classList.add("text-info");
		// document.getElementById('mechanical_condition_dropdown').classList.add("border-info");
		// document.getElementById('cosmetic_condition_dropdown').removeAttribute("onchange");
		// document.getElementById('optical_condition_dropdown').removeAttribute("onchange");
		// document.getElementById('mechanical_condition_dropdown').removeAttribute("onchange");
		// document.getElementById('cosmetic_condition_visible').value = "off";
		// document.getElementById('optical_condition_visible').value = "off";
		// document.getElementById('mechanical_condition_visible').value = "off";
		// return;
		//};
	}

	if (urlArr[4] == "trades" && urlArr[5] == "send_item_to_trade_sheet") {
		//text = text = entry_formatted.replaceAll(/\$/g, "");

		const retail_prices_array = document.getElementsByClassName("retail-line-item");
		const trade_prices_array = document.getElementsByClassName("trade-line-item");
		const purchase_prices_array = document.getElementsByClassName("purchase-line-item");
		let retail_sum = 0;
		let trade_sum = 0;
		let purchase_sum = 0;
		let entry_formatted = "";
		let entry_txt = "";

		for (let i = 0; i < retail_prices_array.length; i++) {
			entry_txt = retail_prices_array[i].innerHTML;
			entry_formatted = entry_txt.replaceAll(/,/g, "");
			entry_formatted = entry_formatted.replaceAll(/\$/g, "");
			retail_sum += Number(entry_formatted);
			// console.log("entry_txt: " + entry_txt);
			// console.log("entry_formatted: " + entry_formatted);
			// console.log("running retail_sum: ");
			// console.log(retail_sum);
		}
		for (let i = 0; i < trade_prices_array.length; i++) {
			entry_txt = trade_prices_array[i].innerHTML;
			entry_formatted = entry_txt.replaceAll(/,/g, "");
			entry_formatted = entry_formatted.replaceAll(/\$/g, "");
			trade_sum += Number(entry_formatted);
			// console.log("entry_txt: " + entry_txt);
			// console.log("entry_formatted: " + entry_formatted);
			// console.log("running trade_sum: ");
			// console.log(trade_sum);
		}
		for (let i = 0; i < purchase_prices_array.length; i++) {
			entry_txt = purchase_prices_array[i].innerHTML;
			entry_formatted = entry_txt.replaceAll(/,/g, "");
			entry_formatted = entry_formatted.replaceAll(/\$/g, "");
			purchase_sum += Number(entry_formatted);
			// console.log("entry_txt: " + entry_txt);
			// console.log("entry_formatted: " + entry_formatted);
			// console.log("running purchase_sum: ");
			// console.log(purchase_sum);
		}

		// console.log("retail_prices_array: " + retail_sum);
		// console.log("trade_prices_array: " + trade_sum);
		// console.log("purchase_prices_array: " + purchase_sum);

		document.getElementById("retail_total_calc").value = retail_sum;
		document.getElementById("trade_total_calc").value = trade_sum;
		document.getElementById("purchase_total_calc").value = purchase_sum;

		document.getElementById("retail_total").innerHTML = Number(retail_sum).toLocaleString("en-US", { style: "currency", currency: "USD" });
		document.getElementById("trade_total").innerHTML = Number(trade_sum).toLocaleString("en-US", { style: "currency", currency: "USD" });
		document.getElementById("purchase_total").innerHTML = Number(purchase_sum).toLocaleString("en-US", { style: "currency", currency: "USD" });
	}

	// const input_elements = document.getElementsByTagName("input");
	// console.log("input_elements:");
	// console.log(input_elements);
	// for (let i = 0; i < input_elements.length; i++) {
	// 	input_elements[i].addEventListener("click", function (event) {
	// 		event.stopPropagation();
	// 	});
	// }

	// ***************************************
	// END OF PAGE LOAD FUNCTION
	// ***************************************//
} //****

// ***************************************
// CUSTOMER LOOKUP (SEARCH)
// ***************************************//

function showCustomersFoundCount(str) {
	console.log("showCustomersFoundCount, str: " + str);
	if (str) {
		//let rawResponse = "";
		let urlStr = document.URL;
		const urlArr = urlStr.split("/");
		urlArr.pop();
		urlArr.push("livesearch");
		urlStr = urlArr.join("/");
		if (str.length == 0) {
			document.getElementById("text_input").innerHTML = "";
			//document.getElementById("text_input").style.border = "0px";
			return;
		}
		let xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				const rawResponse = this.responseText;
				// console.log("<br>showCustomersResult - rawResponse:<br> " + rawResponse + "<br>");
				// parsedText = parseAjaxJSONtoSelectClients(rawResponse);
				// console.log("parsedText var :" + parsedText);
				// document.getElementById("livesearch").innerHTML = parsedText;
				// document.getElementById("livesearch").className = "text-light bg-info border border-2 border-info rounded-2 mt-0 pt-0";
				lineCount = countAjaxDataReturn(rawResponse);
				document.getElementById("itemcount").innerHTML = lineCount;
				if (lineCount == 0) {
					document.getElementById("counter").className = "text-dark";
					document.getElementById("itemcount").innerHTML = "no customers found";
					document.getElementById("count_noun").innerHTML = "";
					document.getElementById("list_customers_btn").disabled = true;
				} else if (lineCount == 1) {
					document.getElementById("count_noun").innerHTML = "customer found";
					document.getElementById("list_customers_btn").disabled = false;
				} else if (lineCount <= 12) {
					document.getElementById("counter").className = "text-success";
					document.getElementById("count_noun").innerHTML = "customers found";
					document.getElementById("list_customers_btn").disabled = false;
				} else if (lineCount <= 50) {
					document.getElementById("counter").className = "text-primary";
					document.getElementById("count_noun").innerHTML = "customers found";
					document.getElementById("list_customers_btn").disabled = false;
				} else if (lineCount <= 100) {
					document.getElementById("counter").className = "text-warning";
					document.getElementById("count_noun").innerHTML = "customers found";
					document.getElementById("list_customers_btn").disabled = false;
				} else {
					document.getElementById("counter").className = "text-danger";
					document.getElementById("count_noun").innerHTML = "customers found";
				}
				document.getElementById("reset_customer_search_btn").disabled = false;
			}
		};
		xmlhttp.open("GET", urlStr + "/" + str, true);
		xmlhttp.send();
	} else {
		console.log("showCustomersFoundCount - no entry data yet.");
		document.getElementById("counter").className = "text-dark";
		document.getElementById("itemcount").innerHTML = "no customers found";
		document.getElementById("count_noun").innerHTML = "";
		document.getElementById("list_customers_btn").disabled = true;
	}
} //****

// function showCustomersResult(str) {
// 	console.log("showCustomersResult - str var :" + str);

// 	if (str) {
// 		//let rawResponse = "";
// 		let urlStr = document.URL;
// 		const urlArr = urlStr.split("/");
// 		urlArr.pop();
// 		urlArr.push("livesearch");
// 		urlStr = urlArr.join("/");
// 		// if (str.length == 0) {
// 		// 	document.getElementById("livesearch").innerHTML = "";
// 		// 	document.getElementById("livesearch").style.border = "0px";
// 		// 	return;
// 		// }
// 		let xmlhttp = new XMLHttpRequest();
// 		xmlhttp.onreadystatechange = function () {
// 			if (this.readyState == 4 && this.status == 200) {
// 				const rawResponse = this.responseText;
// 				//console.log("<br>showCustomersResult - rawResponse:<br> " + rawResponse + "<br>");
// 				parsedText = parseAjaxJSONtoSelectClients(rawResponse);
// 				//console.log("parsedText var :" + parsedText);
// 				// document.getElementById("livesearch").innerHTML = parsedText;
// 				// document.getElementById("livesearch").className = "text-light bg-info border border-2 border-info rounded-2 mt-0 pt-0";
// 				lineCount = countAjaxDataReturn(rawResponse);
// 				document.getElementById("itemcount").innerHTML = lineCount;
// 				if (lineCount <= 12) {
// 					document.getElementById("counter").className = "text-success";
// 				} else if (lineCount <= 50) {
// 					document.getElementById("counter").className = "text-primary";
// 				} else if (lineCount <= 100) {
// 					document.getElementById("counter").className = "text-warning";
// 				} else {
// 					document.getElementById("counter").className = "text-danger";
// 				}
// 				document.getElementById("list_found_btn").classList.remove("visually-hidden");
// 				document.getElementById("new_customer_btn").classList.remove("visually-hidden");
// 			}
// 		};
// 		xmlhttp.open("GET", urlStr + "/" + str, true);
// 		xmlhttp.send();
// 	} else {
// 		console.log("showCustomersResult - else no entry data.");
// 	}
// } //****

function parseAjaxJSONtoSelectClients(str) {
	console.log("str var :" + str);
	const thisObj = JSON.parse(str);
	console.log("thisObj var :" + thisObj);
	parsedText = "";
	for (let x in thisObj) {
		let fullNameStr = caseNameString(thisObj[x].LName) + ", " + caseNameString(thisObj[x].FName);
		//parsedText += '<option value=" &apos;' + thisObj[x].Client_ID.toString() + '&apos;" onclick="confirmFoundCustomer(&apos;' + thisObj[x].Client_ID.toString() + '&apos;)"  > "</option>"';

		parsedText += '<option class="m-1 p-1 bg-info" value=" &apos;' + fullNameStr + '&apos;" onclick="confirmFoundCustomer(&apos;' + thisObj[x].Client_ID.toString() + '&apos;)">' + fullNameStr + '</option>"';
		//console.log("fullNameStr var :" + fullNameStr);
		//console.log("Client_ID var :" + thisObj[x].Client_ID.toString());
	}
	return parsedText;
} //****

function listFoundCustomers(str) {
	// making the table for listing the results
	console.log("str var :" + str);

	if (str) {
		//let rawResponse = "";
		let urlStr = document.URL;
		const urlArr = urlStr.split("/");
		urlArr.pop();
		urlArr.push("livesearch");
		urlStr = urlArr.join("/");
		// if (str.length == 0) {
		// 	document.getElementById("livesearch").innerHTML = "";
		// 	document.getElementById("livesearch").style.border = "0px";
		// 	return;
		// }
		let xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				const rawResponse = this.responseText;
				const thisObj = JSON.parse(rawResponse);
				// console.log("<br>showCustomersResult - rawResponse:<br> " + rawResponse + "<br>");
				// // parsedText = parseAjaxJSONtoSelectClients(rawResponse);
				// // console.log("parsedText var :" + parsedText);
				// document.getElementById("livesearch").innerHTML = parsedText;
				// document.getElementById("livesearch").className = "text-light bg-info border border-2 border-info rounded-2 mt-0 pt-0";
				// lineCount = countAjaxDataReturn(rawResponse);
				// document.getElementById("itemcount").innerHTML = lineCount;
				// if (lineCount < 12) {
				// 	document.getElementById("counter").className = "text-success";
				// } else if (lineCount < 50) {
				// 	document.getElementById("counter").className = "text-primary";
				// } else if (lineCount < 100) {
				// 	document.getElementById("counter").className = "text-warning";
				// } else {
				// 	document.getElementById("counter").className = "text-danger";
				// }
				// document.getElementById("list_found_btn").classList.remove("visually-hidden");
				// document.getElementById("new_customer_btn").classList.remove("visually-hidden");
				formList = "";
				for (let x in thisObj) {
					let emailStr = thisObj[x].email.toUpperCase();
					let fullNameStr = caseNameString(thisObj[x].LName) + ", " + caseNameString(thisObj[x].FName);
					let formattedPhone = formatPhoneNumber(thisObj[x].phone);
					formList +=
						'<tr class="row">' +
						//'<form action="html://google.com">' +
						// '<form method="post" action="' +
						// getURLRoot() +
						// "/customers/check_found_customer/" +
						// thisObj[x].Client_ID.toString() +
						// '">' +
						'<td class="col-2"><form action="' +
						getURLRoot() +
						"/customers/check_found_customer/" +
						thisObj[x].Client_ID.toString() +
						'">' +
						'<input type="submit" class="btn btn-info" value="Select" ' +
						'tabIndex="' +
						x +
						1 +
						'">' +
						"</form ></td >" +
						//////"<input " +
						//'<input id="cust_num_' +
						// thisObj[x].Client_ID.toString() +
						//////'type="submit" class="btn btn-info" ' +
						// 'type="button" class="px-0 btn btn-info" ' +
						// 'onclick="confirmFoundCustomer(&apos;' +
						// thisObj[x].Client_ID.toString() +
						// '&apos;)"' +
						//////'value = "Select" >' +
						//////"</td > " +
						'<td name="fullname" class="col-3">' +
						fullNameStr +
						'</td><td name="phone" class="col-2">' +
						formattedPhone +
						'</td><td name="email" class="col-3">' +
						emailStr +
						"</td>" +
						'<td class="col-2"><form action="' +
						getURLRoot() +
						"/customers/edit/" +
						thisObj[x].Client_ID.toString() +
						'">' +
						'<input type="submit" class="btn btn-warning" value="Update" ' +
						'tabIndex="-1">' +
						"</form ></td >" +
						// '<td class="col-2"><input type="button" class="btn btn-warning"' +
						// //' onclick="notYetAlert();"' +
						// ' onclick="editCustomerData' +
						// "(&apos;" +
						// thisObj[x].Client_ID +
						// '&apos;)"' +
						// 'value="Update" tabIndex="-1"></td>' +

						"</tr>";
				}
				document.getElementById("list_customers_btn").disabled = true;
				document.getElementById("make_new_customer_btn").disabled = false;
				document.getElementById("result_list").innerHTML = formList;
				document.getElementById("result_table").classList.remove("visually-hidden");
				document.getElementById("result_table").rows[1].cells[0].getElementsByTagName("input")[0].focus();
				const dynamic_tab_index = document.getElementById("result_table").rows.length - 1;
				document.getElementById("make_new_customer_btn").tabIndex = dynamic_tab_index + "1";
				document.getElementById("reset_customer_search_btn").tabIndex = dynamic_tab_index + "2";
			}
		};
		xmlhttp.open("GET", urlStr + "/" + str, true);
		xmlhttp.send();
	} else {
		console.log("listFoundCustomers - no entry data yet.");
	}

	//const thisObj = JSON.parse(rawResponse);
} //****

function confirmFoundCustomer(cust_id) {
	// 	alert("confirming Found Customer: " + cust_id);
	//alert("URL ROOT: " + getURLRoot());
	//alert("FULL URL : " + getURLRoot() + "/customers/check_found_customer/" + cust_id);
	// 	//updateAndSubmitForm("confirm_found_cutomer_form");

	// 	buttonObject = document.getElementById("cust_num_" + cust_id);
	// 	document.getElementById("customer_id").value = cust_id;
	// 	buttonObject.formAction = getURLRoot() + "/customers/check_found_customer";

	// 	document.getElementById("confirm_found_cutomer_form").submit();
	window.location.href = getURLRoot() + "/customers/check_found_customer/" + cust_id; //****
} //****

function editCustomerData(custID) {
	notYetAlert();
} //****

// ***************************************
// AJAX ITEMS SEARCHING
// ***************************************//

function showItemsResultPreview(str) {
	//console.log("showItemsResultPreview: str var :" + str);
	if (str) {
		str = str.replace(/ /g, "[]");
		let cleanStr = str.replaceAll("%", "-|-");
		cleanStr = cleanStr.replaceAll("&", "@@");
		console.log("str: " + str);
		console.log("cleanStr: " + cleanStr);
		//rawResponse = "";
		let urlStr = document.URL;
		let urlArr = urlStr.split("/");
		urlArr.pop();
		if (document.getElementById("loose-search").checked) {
			urlArr.push("liveSearchLoose");
		} else {
			urlArr.push("liveSearchStrict");
		}
		urlStr = urlArr.join("/");
		console.log("urlStr: " + urlStr);

		fullURL = urlStr + "/" + cleanStr;
		console.log("fullUrl var :" + fullURL);

		if (str.length == 0) {
			document.getElementById("livesearch").innerHTML = "";
			document.getElementById("livesearch").style.border = "0px";
			return;
		}

		let xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				const rawResponse = this.responseText;
				console.log("showItemsResultPreview - rawresponse: " + rawResponse);

				const parsedText = parseAjaxJSONtoSelectItems(rawResponse);
				//

				document.getElementById("result_preview").classList.remove("visually-hidden");
				document.getElementById("livesearch").innerHTML = parsedText;
				// document.getElementById("livesearch").className = "col-9 text-light bg-info border border-2 border-info rounded-2 mt-0 pt-0";
				lineCount = countAjaxDataReturn(rawResponse);
				document.getElementById("reset_search_btn").disabled = false;
				document.getElementById("itemcount").innerHTML = lineCount;
				if (lineCount == 0) {
					document.getElementById("list_items_btn").disabled = true;
					document.getElementById("new_item_btn").disabled = true;
					document.getElementById("result_preview").classList.add("visually-hidden");
					//document.getElementById("livesearch").classList.add("visually-hidden");
					document.getElementById("counter").className = "text-dark";
				} else if (lineCount == 1) {
					//console.log("single item parsed text: " + parsedText);
					document.getElementById("item_pronoun").innerHTML = "item";
					document.getElementById("counter").className = "text-success";
					document.getElementById("list_items_btn").disabled = false;
					document.getElementById("new_item_btn").disabled = false;
					const item_id = parseAjaxJSONtoSelectSingleItemId(rawResponse);
					//console.log("gonna select item #: " + item_id);

					//add event listener to make the "list_results_button" into a "select_this_item_button".
					document.getElementById("list_items_btn").addEventListener("click", function () {
						confirmFoundItem(item_id);
					});
				} else if (lineCount < 12) {
					document.getElementById("counter").className = "text-success";
					document.getElementById("list_items_btn").disabled = false;
					document.getElementById("new_item_btn").disabled = false;
				} else if (lineCount < 50) {
					document.getElementById("counter").className = "text-primary";
					document.getElementById("list_items_btn").disabled = false;
					document.getElementById("new_item_btn").disabled = false;
				} else if (lineCount < 100) {
					document.getElementById("counter").className = "text-warning";
					document.getElementById("list_items_btn").disabled = false;
					document.getElementById("new_item_btn").disabled = false;
				} else {
					document.getElementById("counter").className = "text-danger";
					document.getElementById("list_items_btn").disabled = true;
					document.getElementById("new_item_btn").disabled = false;
				}
			}
		};

		xmlhttp.open("POST", fullURL, true);
		xmlhttp.send();
	} else {
		console.log("showItemsResultPreview - no entry data yet.");
	}
} //****

function parseAjaxJSONtoSelectItems(str) {
	const thisObj = JSON.parse(str);
	parsedText = "";
	for (let x in thisObj) {
		let display_title = thisObj[x].medium_description;
		parsedText += "<tr><td>" + display_title + "</td></tr>";
	}
	console.log("parsedText var :" + parsedText);
	return parsedText;
} //****

function parseAjaxJSONtoSelectSingleItemId(str) {
	const thisObj = JSON.parse(str);
	let item_id = thisObj[0].trade_lu_id;
	return item_id;
} //****

function listFoundItems(str, admin_test = "0") {
	//console.log("listFoundItems: is_admin: " + admin_test);
	//console.log("listFoundItems: str: " + str);
	if (str) {
		str = str.replace(/ /g, "[]");
		let cleanStr = str.replaceAll("%", "-|-");
		cleanStr = cleanStr.replaceAll("&", "@@");
		console.log("cleanStr: " + cleanStr);
		let urlStr = document.URL;
		let urlArr = urlStr.split("/");
		urlArr.pop();
		if (document.getElementById("loose-search").checked) {
			urlArr.push("liveSearchLoose");
		} else {
			urlArr.push("liveSearchStrict");
		}
		urlStr = urlArr.join("/");
		fullURL = urlStr + "/" + cleanStr;
		console.log("AJAX url: " + fullURL);

		let xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				const rawResponse = this.responseText;
				//console.log("listFoundItems: rawResponse: " + rawResponse);

				// 	formList = '<tr class="row"><td classs="col-12"><b><i>NO LOOK-UP-TABLE ITEMS TO DISPLAY</i></b></td></tr>';
				// } else {
				const thisObj = JSON.parse(rawResponse);
				//console.log("listFoundItems->thisObj: ", Object.keys(thisObj));
				formList = "";
				for (let x in thisObj) {
					formList +=
						'<tr class="row">' +
						'<td class="col-2">' +
						"<input " +
						'value="Select" type="button" class="btn btn-info btn-sm" onclick="confirmFoundItem(\'' +
						thisObj[x].trade_lu_id +
						"')\"" +
						"tabIndex=" +
						x +
						1 +
						">" +
						'</td><td class="col-3">' +
						thisObj[x].medium_description +
						'<span class="small text-primary"><br>' +
						thisObj[x].comments +
						"</span>" +
						'</td><td class="col-1">' +
						thisObj[x].minor +
						'</td><td class="col-2 centered">' +
						thisObj[x].vsn +
						'</td><td class="col-1">' +
						thisObj[x].family +
						'</td><td class="col-1">' +
						thisObj[x].trade_lu_id +
						"</td>";
					//if (admin_test == 1) {
					formList += '<td class="col-2 centered"><input value="Edit" type="button" class="btn btn-warning btn-sm" onclick="editFoundItem(\'' + thisObj[x].trade_lu_id + '\')" tabIndex="-1"></td ></tr>';
					//} else {
					//	formList += '<td class="col-3 centered"><input value="Edit" type="button" class="btn btn-warning btn-sm" onclick="notYetAlert();" tabIndex="-1"></td ></tr>';
					//}
				}

				document.getElementById("result_list").innerHTML = formList;
				document.getElementById("result_table").classList.remove("visually-hidden");
				document.getElementById("result_preview").classList.add("visually-hidden");
				document.getElementById("list_items_btn").disabled = true;
				document.getElementById("new_item_btn").disabled = false;
				document.getElementById("searchfield").value = "";
				document.getElementById("counter").className = "visually-hidden";
				document.getElementById("searchfield").tabIndex = "-1";
				// document.getElementById("list_customers_btn").tabIndex = "-1";
				// document.getElementById("reset_customer_search_btn").tabIndex = "-1";
				document.getElementById("result_table").rows[1].cells[0].getElementsByTagName("input")[0].focus();
				let dynamic_tab_index = document.getElementById("result_table").rows.length - 1 + "1";
				document.getElementById("new_item_btn").tabIndex = dynamic_tab_index;
			}
		};
		xmlhttp.open("GET", urlStr + "/" + cleanStr, true);
		xmlhttp.send();
	}
} //****

function confirmFoundItem(itemID) {
	//window.location.href = "./confirm_lut_item_for_trade_sheet/" + itemID;
	const urlArr = document.URL.split("/");
	full_url = urlArr[0] + "//" + urlArr[2] + "/" + urlArr[3] + "/" + "trades/confirm_lut_item_for_trade_sheet/" + itemID;
	console.log(`good to go: ` + full_url);
	window.location.href = full_url;
} //****

function editFoundItem(itemID) {
	const urlArr = document.URL.split("/");
	edit_url = urlArr[0] + "//" + urlArr[2] + "/" + urlArr[3] + "/" + "trades/lut_item_edit/" + itemID;
	//console.log(`good to go`);
	window.location.href = edit_url;
	//notYetAlert();
}

function resetFindForm() {
	document.getElementById("livesearch").classList.add("visually-hidden");
	document.getElementById("counter").classList.add("visually-hidden");
	document.getElementById("result_table").classList.add("visually-hidden");
	//document.getElementById("new_entry_btn").classList.add("visually-hidden");
	document.getElementById("searchfield").value = "";
	document.getElementById("list_items_btn").disabled = true;
	document.getElementById("new_item_btn").disabled = true;
	if (document.getElementById("loose-search").checked) {
		document.getElementById("wildcards_btn").classList.remove("disabled");
	} else {
		document.getElementById("wildcards_btn").classList.add("disabled");
	}
} //****

function countAjaxDataReturn(str) {
	const thisObj = JSON.parse(str);
	recordCount = thisObj.length;
	return recordCount;
} //****

// ***************************************
// ITEM PRICE - CONDITION MATRIX CALCLUATIONS
// ***************************************//

function calculateEntirePriceMatrix() {
	console.log("calculateEntirePriceMatrix");
}

function updateMatrixValue(this_value, this_target) {
	console.log("updateMatrixValue - value: " + this_value);
	console.log("updateMatrixValue - target: " + this_target);
}

// heres where we do the tuner calculation math
function calculateTunerFactor(factor, tuner) {
	//console.log("calculateTunerFactor");
	// console.log("factor: " + factor);
	// console.log("tuner: " + tuner);
	let calculation = 1;
	let doit = false;
	const factor_num = Number(factor);
	const tuner_num = Number(tuner);

	if (factor_num > 0) {
		doit = true;
		//calculation = 1;
		// } else if (factor > 1) {
		// 	calculation = factor + factor * tuner;
		//} else {
		calculation = factor_num * tuner_num + factor_num;
	}
	if (calculation == 0) {
		calculation = 1;
	}
	if (isNaN(calculation)) {
		calculation = 1;
	}
	// console.log("%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%");
	// console.log("Do the Calculation :" + doit);
	// console.log("factor_num var :" + typeof factor_num);
	// console.log("factor_num :" + factor_num);
	// console.log("tuner_num var :" + typeof tuner_num);
	// console.log("tuner_num :" + tuner_num);
	// console.log("calculation var: " + typeof calculation);
	// console.log("calculation: " + calculation);
	// console.log("%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%");

	return Number(calculation);
} //****

/// ********** MAIN TRADE SHEET CALCULATOR ****************///
function calculateSelectLutItemPriceMatrix() {
	//
	let has_cosmetics = getFormFieldValue("has_cosmetics"); //cosmetic switch
	let has_opticals = getFormFieldValue("has_opticals"); //optical switch
	let has_mechanicals = getFormFieldValue("has_mechanicals"); //mechanical switch

	let cosmetic_selected_val = Number(getFormFieldValue("cosmetic_condition_selected_value")); // cosmetic value in the hidden field
	let optical_selected_val = Number(getFormFieldValue("optical_condition_selected_value")); // optical value in the hidden field
	let mechanical_selected_val = Number(getFormFieldValue("mechanical_condition_selected_value")); // mechanical value in the hidden field

	let cosmetic_tune_val = Number(getFormFieldValue("cosmetic_tune_val")); //cosmetic tweak value "factor_cosmetic_condition"
	let optical_tune_val = Number(getFormFieldValue("optical_tune_val")); //optical tweak value "factor_optical_condition"
	let mechanical_tune_val = Number(getFormFieldValue("mechanical_tune_val")); //mechanical tweak value "factor_mechanical_condition"

	let base_price = Number(getFormFieldValue("base_price_field"));
	let trade_percent = Number(getFormFieldValue("trade_percent"));
	let purchase_percent = Number(getFormFieldValue("purchase_percent"));
	let cosm_calc = 1;
	let opti_calc = 1;
	let mech_calc = 1;
	//let display_base = 0;
	let display_retail = 0;
	let display_trade = 0;
	let display_purchase = 0;
	let calculated_retail = 0;
	let calculated_trade = 0;
	let calculated_purchase = 0;
	let missing_data = false;
	// let no_trade = false;
	// let not_selected = false;

	// heres's where we turn off/on unused condtion catergories
	// and factor in the tuner- see "calculateTunerFactor()" function
	if (has_cosmetics == "1") {
		cosm_calc = calculateTunerFactor(cosmetic_selected_val, cosmetic_tune_val);
	}
	if (has_opticals == "1") {
		opti_calc = calculateTunerFactor(optical_selected_val, optical_tune_val);
	}
	if (has_mechanicals == "1") {
		mech_calc = calculateTunerFactor(mechanical_selected_val, mechanical_tune_val);
	}

	// if the base price data is missing from the DB
	if (base_price == 0) {
		missing_data = true;
		base_price = document.getElementById("base_price").value;
	}

	console.log("__________");
	console.log("base_price: " + base_price);
	console.log("trade_percent: " + trade_percent);
	console.log("purchase_percent: " + purchase_percent);
	console.log("__________");
	console.log("cosm_calc: " + cosm_calc);
	console.log("opti_calc: " + opti_calc);
	console.log("mech_calc: " + mech_calc);

	// heres's the main math
	calculated_retail = base_price * cosm_calc * opti_calc * mech_calc;
	calculated_trade = calculated_retail * (trade_percent / 100);
	calculated_purchase = calculated_retail * (purchase_percent / 100);

	console.log("calculated_retail: " + calculated_retail);
	console.log("calculated_trade: " + calculated_trade);
	console.log("calculated_purchase: " + calculated_purchase);

	// here is where we work on the display of the calculations
	if (calculated_retail > 100) {
		display_retail = priceToFive(calculated_retail);
	} else {
		display_retail = priceToCurrent(calculated_retail);
	}

	if (calculated_trade > 100) {
		display_trade = priceToFive(calculated_trade);
	} else {
		display_trade = priceToCurrent(calculated_trade);
	}

	if (calculated_purchase > 100) {
		display_purchase = priceToFive(calculated_purchase);
	} else {
		display_purchase = priceToCurrent(calculated_purchase);
	}

	document.getElementById("base_price").value = base_price.toLocaleString("en-US", {
		style: "currency",
		currency: "USD",
	});

	document.getElementById("retail_calc_label").innerHTML = display_retail.toLocaleString("en-US", {
		style: "currency",
		currency: "USD",
	});
	document.getElementById("trade_calc_label").innerHTML = display_trade.toLocaleString("en-US", {
		style: "currency",
		currency: "USD",
	});
	document.getElementById("purchase_calc_label").innerHTML = display_purchase.toLocaleString("en-US", {
		style: "currency",
		currency: "USD",
	});
	document.getElementById("retail_price_override").value = display_retail.toLocaleString("en-US", {
		style: "currency",
		currency: "USD",
	});
	document.getElementById("trade_price_override").value = display_trade.toLocaleString("en-US", {
		style: "currency",
		currency: "USD",
	});
	document.getElementById("purchase_price_override").value = display_purchase.toLocaleString("en-US", {
		style: "currency",
		currency: "USD",
	});
} //****

function processManualBaseTradePurchaseEntry() {
	document.getElementById("base_price").value = document.getElementById("base_price_field").value;

	document.getElementById("trade_percent").value = document.getElementById("trade_percent_field").value;

	document.getElementById("purchase_percent").value = document.getElementById("purchase_percent_field").value;

	updatePricingDisplay();
}

function formatTradePricesToCurrencyPrice(field_id, field_value) {
	// 	console.log("+_#-+_#-+_#-+_#-+_#-+_#-");
	// 	console.log("formatTradePricesToCurrency");
	// 	console.log("field_id var: " + field_id);
	// 	console.log("field_value var: " + field_value);

	field_value = field_value.replace("$", "");
	field_value = field_value.replace(",", "");
	field_value = field_value.replace(",", "");
	field_value = field_value.trim();
	let clean = Number(field_value);
	let displayBaseNum = priceToFive(clean);
	let displayBaseCurrencyStr = "";
	if (displayBaseNum <= 0 || isNaN(displayBaseNum)) {
		displayBaseCurrencyStr = "";
	} else {
		displayBaseCurrencyStr = displayBaseNum.toLocaleString("en-US", { style: "currency", currency: "USD" });
	}
	console.log("displayBaseNum var :" + displayBaseNum);
	console.log("displayBaseNum type :" + typeof displayBaseNum);
	console.log("displayBaseCurrency var :" + displayBaseCurrencyStr);
	console.log("displayBaseCurrency type :" + typeof displayBaseCurrencyStr);
	console.log("set the value now");
	console.log("+_#-+_#-+_#-+_#-+_#-+_#-");
	document.getElementById(field_id).value = displayBaseCurrencyStr;
	// console.log("that worked");

	// let retail_entry_a = document.getElementById("retail_calc_label").innerHTML.includes("NaN");
	// if (retail_entry_a) {
	// 	document.getElementById("retail_calc_label").innerHTML = "need data";
	// }
	// let retail_entry_b = document.getElementById("retail_calc_label").innerHTML.includes("-$0.01");
	// if (retail_entry_b) {
	// 	document.getElementById("retail_calc_label").innerHTML = "";
	// }

	// let retail_override_a = document.getElementById("retail_price_override").value.includes("NaN");
	// if (retail_override_a) {
	// 	document.getElementById("retail_price_override").value = "";
	// }
	// let retail_override_b = document.getElementById("retail_price_override").value.includes("-$0.01");
	// if (retail_override_b) {
	// 	document.getElementById("retail_price_override").value = "";
	// }

	// let trade_entry_a = document.getElementById("trade_calc_label").innerHTML.includes("NaN");
	// if (trade_entry_a) {
	// 	document.getElementById("trade_calc_label").innerHTML = "need data";
	// }
	// let trade_entry_b = document.getElementById("trade_calc_label").innerHTML.includes("-$0.01");
	// if (trade_entry_b) {
	// 	document.getElementById("trade_calc_label").innerHTML = "";
	// }
	// let trade_override_a = document.getElementById("trade_price_override").value.includes("NaN");
	// if (trade_override_a) {
	// 	document.getElementById("trade_price_override").value = "";
	// }
	// let trade_override_b = document.getElementById("trade_price_override").value.includes("-$0.01");
	// if (trade_override_b) {
	// 	document.getElementById("trade_price_override").value = "";
	// }

	// let purchase_entry_a = document.getElementById("purchase_calc_label").innerHTML.includes("NaN");
	// if (purchase_entry_a) {
	// 	document.getElementById("purchase_calc_label").innerHTML = "need data";
	// }
	// let purchase_entry_b = document.getElementById("purchase_calc_label").innerHTML.includes("-$0.01");
	// if (purchase_entry_b) {
	// 	document.getElementById("purchase_calc_label").innerHTML = "";
	// }
	// let purchase_override_a = document.getElementById("purchase_price_override").value.includes("NaN");
	// if (purchase_override_a) {
	// 	document.getElementById("purchase_price_override").value = "";
	// }
	// let purchase_override_b = document.getElementById("purchase_price_override").value.includes("-$0.01");
	// if (purchase_override_b) {
	// 	document.getElementById("purchase_price_override").value = "";
	// }
} //****

function formatTradePricesToCurrencyPlain(field_id, field_value) {
	field_value = field_value.replace("$", "");
	field_value = field_value.replace(",", "");
	field_value = field_value.replace(",", "");
	field_value = field_value.trim();
	let displayBaseNum = Number(field_value);
	let displayBaseCurrencyStr = "";
	if (displayBaseNum <= 0 || isNaN(displayBaseNum)) {
		displayBaseCurrencyStr = "";
	} else {
		displayBaseCurrencyStr = displayBaseNum.toLocaleString("en-US", { style: "currency", currency: "USD" });
	}

	document.getElementById(field_id).value = displayBaseCurrencyStr;
}

function clearTradePriceWarnings(field_id) {
	removeFieldHighlight(document.getElementById(field_id));
}

// function tradeSheetCalulateTotals() {
// 	//const retail_itmes = document.getElementsByClassName("retail-line-item");
// 	const retail_fields = document.querySelectorAll(".retail-line-item");
// 	const trade_fields = document.querySelectorAll(".trade-line-item");
// 	const purchase_fields = document.querySelectorAll(".purchase-line-item");
// 	let retail_total = 0;
// 	retail_fields.forEach(function (field) {
// 		retail_total += Number(field.innerHTML);
// 	});
// 	const retail_total_str = retail_total.toLocaleString("en-US", {
// 		style: "currency",
// 		currency: "USD",
// 	});
// 	document.getElementById("retail_total").innerHTML = retail_total_str;
// 	document.getElementById("retail_total_calc").value = retail_total_str;
// 	let trade_total = 0;
// 	trade_fields.forEach(function (field) {
// 		trade_total += Number(field.innerHTML);
// 	});
// 	const trade_total_str = trade_total.toLocaleString("en-US", {
// 		style: "currency",
// 		currency: "USD",
// 	});
// 	document.getElementById("trade_total").innerHTML = trade_total_str;
// 	document.getElementById("trade_total_calc").value = trade_total_str;
// 	let purchase_total = 0;
// 	purchase_fields.forEach(function (field) {
// 		purchase_total += Number(field.innerHTML);
// 	});
// 	const purchase_total_str = purchase_total.toLocaleString("en-US", {
// 		style: "currency",
// 		currency: "USD",
// 	});
// 	document.getElementById("purchase_total").innerHTML = purchase_total_str;
// 	document.getElementById("purchase_total_calc").value = purchase_total_str;
// 	transaction_flag = document.getElementById("transaction_flag").value;
// 	updateTradeTotalDisplay(transaction_flag);
// } //****

function updateTradeTotalDisplay(clicked_id) {
	const retail_total = document.getElementById("retail_total").innerHTML;
	const trade_total = document.getElementById("trade_total").innerHTML;
	const purchase_total = document.getElementById("purchase_total").innerHTML;
	const trade_fields = document.querySelectorAll(".trade-line-item");
	const purchase_fields = document.querySelectorAll(".purchase-line-item");
	let transaction_total_display = "Error, missing data for calculations.";

	if (document.getElementById("quote_transaction").checked) {
		//console.log("clicking the quote_transaction button");
		transaction_total_display = "Quote";
		transaction_total_display += "<br>";
		//transaction_total_display += "<br>";
		transaction_total_display += "Trade Offer: " + trade_total;
		transaction_total_display += "<br>";
		transaction_total_display += "Purchase Offer: " + purchase_total;
		//transaction_total_display += "<br>";

		//CLEAR TRADE FIELDS
		trade_fields.forEach(function (field) {
			field.className = "trade-line-item";
			field.classList.remove("bg-warning");
			field.classList.remove("bg-opacity-10");
			field.classList.remove("text-black-50");
		});
		document.getElementById("trade_line_label_1").classList.remove("bg-warning");
		document.getElementById("trade_line_label_1").classList.remove("bg-opacity-50");
		document.getElementById("trade_line_label_2").classList.remove("bg-warning");
		document.getElementById("trade_line_label_2").classList.remove("bg-opacity-50");

		//CLEAR PURCHASE FIELDS
		purchase_fields.forEach(function (field) {
			field.className = "purchase-line-item";
			field.classList.remove("bg-success");
			field.classList.remove("bg-opacity-10");
			field.classList.remove("text-black-50");
		});
		document.getElementById("purchase_line_label_1").classList.remove("bg-success");
		document.getElementById("purchase_line_label_1").classList.remove("bg-opacity-50");
		document.getElementById("purchase_line_label_2").classList.remove("bg-success");
		document.getElementById("purchase_line_label_2").classList.remove("bg-opacity-50");

		document.getElementById("purchase_total_set").classList.remove("bg-opacity-50");
		document.getElementById("transaction_total_calc").value = "";
	}

	if (document.getElementById("trade_transaction").checked) {
		//transaction_total_display = "Trade Transaction";

		transaction_total_display = '<span class="text-warning">Trade Offer</br>';
		transaction_total_display += "Amount: " + trade_total + "</span>";

		//CLEAR PURCHASE FIELDS
		purchase_fields.forEach(function (field) {
			field.className = "purchase-line-item";
			field.classList.remove("bg-success");
			field.classList.remove("bg-opacity-10");
			field.classList.remove("text-black-50");
		});
		document.getElementById("purchase_line_label_1").classList.remove("bg-success");
		document.getElementById("purchase_line_label_1").classList.remove("bg-opacity-50");
		document.getElementById("purchase_line_label_2").classList.remove("bg-success");
		document.getElementById("purchase_line_label_2").classList.remove("bg-opacity-50");

		document.getElementById("purchase_total_set").classList.remove("bg-opacity-50");

		//SET THE TRADES FIELDS
		trade_fields.forEach(function (field) {
			field.classList.add("bg-warning");
			field.classList.add("bg-opacity-10");
			field.classList.remove("text-black-50");
		});
		document.getElementById("trade_line_label_1").classList.add("bg-warning");
		document.getElementById("trade_line_label_1").classList.add("bg-opacity-50");
		document.getElementById("trade_line_label_2").classList.add("bg-warning");
		document.getElementById("trade_line_label_2").classList.add("bg-opacity-50");

		document.getElementById("trade_total_set").classList.add("bg-opacity-50");
		document.getElementById("transaction_total_calc").value = trade_total;
	}

	if (document.getElementById("purchase_transaction").checked) {
		//transaction_total_display = "Purchase Transaction";
		transaction_total_display = '<span class="text-success">Purchase Offer</br>';
		transaction_total_display += "Amount: " + purchase_total + "</span>";

		//CLEAR TRADE FIELDS
		trade_fields.forEach(function (field) {
			field.className = "trade-line-item";
			field.classList.remove("bg-warning");
			field.classList.remove("bg-opacity-10");
			field.classList.remove("text-black-50");
		});
		document.getElementById("trade_line_label_1").classList.remove("bg-warning");
		document.getElementById("trade_line_label_1").classList.remove("bg-opacity-50");
		document.getElementById("trade_line_label_2").classList.remove("bg-warning");
		document.getElementById("trade_line_label_2").classList.remove("bg-opacity-50");

		document.getElementById("trade_total_set").classList.remove("bg-opacity-50");

		//SET THE PURCHASE FIELDS
		purchase_fields.forEach(function (field) {
			field.classList.add("bg-success");
			field.classList.add("bg-opacity-10");
			field.classList.remove("text-black-50");
		});
		document.getElementById("purchase_line_label_1").classList.add("bg-success");
		document.getElementById("purchase_line_label_1").classList.add("bg-opacity-50");
		document.getElementById("purchase_line_label_2").classList.add("bg-success");
		document.getElementById("purchase_line_label_2").classList.add("bg-opacity-50");

		document.getElementById("purchase_total_set").classList.add("bg-opacity-50");
		document.getElementById("transaction_total_calc").value = purchase_total;
	}

	document.getElementById("transaction_total_display_field").innerHTML = transaction_total_display;
	document.getElementById("transaction_flag").value = clicked_id;
	setTradeRadioButtons(clicked_id);
} //****

function updateRefPrice(target_field) {
	//ref_mint_display

	console.log("target field: " + target_field);
	const price_entry = document.getElementById("retail_calc").value;
	console.log("price_entry: " + price_entry);
	const price_entry_num = price_entry.replace(/[$,]+/g, "");
	console.log("price_entry_num: " + price_entry_num);
	if (price_entry_num > 0) {
		console.log("do it");
		document.getElementById(target_field).value = price_entry;
	} else {
		console.log("no base price data");
	}
} //****

// ***************************************
// TRADE SHEET
// ***************************************//

function loadDefaultPricingMatrix(this_val) {
	console.log("loadDefaultPricingMatrix, this_val: ", this_val);
	//let rawResponse = "";
	let urlStr = document.URL;
	let urlArr = urlStr.split("/");
	urlArr.pop();
	urlArr.push("minor_codes_default_price_matrix_data");
	urlStr = urlArr.join("/");
	//ajaxLoad(urlStr, parseHuntData, str);
	let xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			const rawResponse = this.responseText;
			console.log("loadDefaultPricingMatrix - rawResponse ", rawResponse);
			const jsonObj = JSON.parse(this.responseText);
			console.log("jsonObj[this_val]: ", jsonObj[this_val]);
			updateFormFieldValue("trade_percent_entry", jsonObj[this_val]["pricing-matrix"]["trade-percent"]);
			updateFormFieldValue("purchase_percent_entry", jsonObj[this_val]["pricing-matrix"]["purchase-percent"]);
			const cosmetic_on = jsonObj[this_val]["pricing-matrix"]["cosmetic"]["relevant"];
			const mechanical_on = jsonObj[this_val]["pricing-matrix"]["mechanical"]["relevant"];
			const optical_on = jsonObj[this_val]["pricing-matrix"]["optical"]["relevant"];
			updateFormFieldValue("cosmetic_condition_tuner", jsonObj[this_val]["pricing-matrix"]["cosmetic"]["tuner"]);
			updateFormFieldValue("mechanical_condition_tuner", jsonObj[this_val]["pricing-matrix"]["mechanical"]["tuner"]);
			updateFormFieldValue("optical_condition_tuner", jsonObj[this_val]["pricing-matrix"]["optical"]["tuner"]);
			updateFormFieldValue("cosmetic_conditon_factor_mint", jsonObj[this_val]["pricing-matrix"]["cosmetic"]["mint"]);
			updateFormFieldValue("cosmetic_conditon_factor_nearmint", jsonObj[this_val]["pricing-matrix"]["cosmetic"]["nearmint"]);
			updateFormFieldValue("cosmetic_conditon_factor_excellent", jsonObj[this_val]["pricing-matrix"]["cosmetic"]["excellent"]);
			updateFormFieldValue("cosmetic_conditon_factor_verygood", jsonObj[this_val]["pricing-matrix"]["cosmetic"]["verygood"]);
			updateFormFieldValue("cosmetic_conditon_factor_average", jsonObj[this_val]["pricing-matrix"]["cosmetic"]["average"]);
			updateFormFieldValue("cosmetic_conditon_factor_fair", jsonObj[this_val]["pricing-matrix"]["cosmetic"]["fair"]);
			updateFormFieldValue("cosmetic_conditon_factor_poor", jsonObj[this_val]["pricing-matrix"]["cosmetic"]["poor"]);
			updateFormFieldValue("mechanical_conditon_factor_operational", jsonObj[this_val]["pricing-matrix"]["mechanical"]["operational"]);
			updateFormFieldValue("mechanical_conditon_factor_minordefect", jsonObj[this_val]["pricing-matrix"]["mechanical"]["minordefect"]);
			updateFormFieldValue("mechanical_conditon_factor_majordefect", jsonObj[this_val]["pricing-matrix"]["mechanical"]["majordefect"]);
			updateFormFieldValue("mechanical_conditon_factor_parts", jsonObj[this_val]["pricing-matrix"]["mechanical"]["parts"]);
			updateFormFieldValue("optical_conditon_factor_mint", jsonObj[this_val]["pricing-matrix"]["optical"]["mint"]);
			updateFormFieldValue("optical_conditon_factor_nearmint", jsonObj[this_val]["pricing-matrix"]["optical"]["nearmint"]);
			updateFormFieldValue("optical_conditon_factor_excellent", jsonObj[this_val]["pricing-matrix"]["optical"]["excellent"]);
			updateFormFieldValue("optical_conditon_factor_verygood", jsonObj[this_val]["pricing-matrix"]["optical"]["verygood"]);
			updateFormFieldValue("optical_conditon_factor_average", jsonObj[this_val]["pricing-matrix"]["optical"]["average"]);
			updateFormFieldValue("optical_conditon_factor_fair", jsonObj[this_val]["pricing-matrix"]["optical"]["fair"]);
			updateFormFieldValue("optical_conditon_factor_poor", jsonObj[this_val]["pricing-matrix"]["optical"]["poor"]);
			// cosmetic_dropdown_set
			// cosmetic_condition_dropdown_switch
			// cosmetic_condition_dropdown_switch_label
			// document.getElementById("cosmetic_dropdown_set").classList.add("visually-hidden");
			// document.getElementById(switch_label_id).innerHTML = "Show " + text_entry + " Condition Selector";
			// document.getElementById(switch_id).checked = false;
			// document.getElementById(switch_id).blur();
			if (cosmetic_on) {
				document.getElementById("cosmetic_dropdown_set").classList.remove("visually-hidden");
				document.getElementById("cosmetic_condition_dropdown_switch").classList.remove("visually-hidden");
				//document.getElementById('cosmetic_condition_dropdown_switch_label').innerHTML = "Hide Cosmetic Condition Selector";
			} else {
				document.getElementById("cosmetic_pricing_set").classList.add("visually-hidden");
				document.getElementById("cosmetic_condition_dropdown_set").classList.remove("visually-hidden");
				document.getElementById("cosmetic_condition_dropdown_switch_label").innerHTML = "Show Cosmetic Condition Selector";
				document.getElementById("cosmetic_condition_dropdown_switch_check").classList.remove("visually-hidden");
			}
			if (optical_on) {
				document.getElementById("optical_dropdown_set").classList.remove("visually-hidden");
				document.getElementById("optical_condition_dropdown_switch").classList.remove("visually-hidden");
				//document.getElementById('optical_condition_dropdown_switch_label').innerHTML = "Hide Cosmetic Condition Selector";
			} else {
				document.getElementById("optical_dropdown_set").classList.add("visually-hidden");
				document.getElementById("optical_condition_dropdown_switch").classList.remove("visually-hidden");
				document.getElementById("optical_condition_dropdown_switch_label").innerHTML = "Show Optical Condition Selector";
				document.getElementById("optical_condition_dropdown_switch_check").classList.remove("visually-hidden");
			}
			if (mechanical_on) {
				document.getElementById("mechanical_dropdown_set").classList.remove("visually-hidden");
				document.getElementById("mechanical_condition_dropdown_switch").classList.remove("visually-hidden");
				//document.getElementById('mechanical_condition_dropdown_switch_label').innerHTML = "Hide Cosmetic Condition Selector";
			} else {
				document.getElementById("mechanical_dropdown_set").classList.add("visually-hidden");
				document.getElementById("mechanical_condition_dropdown_switch").classList.remove("visually-hidden");
				document.getElementById("mechanical_condition_dropdown_switch_label").innerHTML = "Show Optical Condition Selector";
				document.getElementById("mechanical_condition_dropdown_switch_check").classList.remove("visually-hidden");
			}
		}
	};
	xmlhttp.open("GET", urlStr, true);
	xmlhttp.setRequestHeader("Content-type", "application/json");
	xmlhttp.send();
} //****

function selectConditionDropdown(id_str) {
	console.log("-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_");
	console.log("Select Condition");
	let reset_form = false;
	const cosmetic_condition_selected_text = document.getElementById("cosmetic_condition_dropdown").options[document.getElementById("cosmetic_condition_dropdown").selectedIndex].text;
	// let cosmetic_condition_selected_value = document.getElementById("cosmetic_condition_dropdown").options[document.getElementById("cosmetic_condition_dropdown").selectedIndex].value;
	const optical_condition_selected_text = document.getElementById("optical_condition_dropdown").options[document.getElementById("optical_condition_dropdown").selectedIndex].text;
	// let optical_condition_selected_value = document.getElementById("optical_condition_dropdown").options[document.getElementById("optical_condition_dropdown").selectedIndex].value;
	const mechanical_condition_selected_text = document.getElementById("mechanical_condition_dropdown").options[document.getElementById("mechanical_condition_dropdown").selectedIndex].text;
	// let mechanical_condition_selected_value = document.getElementById("mechanical_condition_dropdown").options[document.getElementById("mechanical_condition_dropdown").selectedIndex].value;

	const cond_element_id = id_str;
	let cond_selected_targ_arr = id_str.split("_");
	const cond_selected_targ_text = document.getElementById(id_str).options[document.getElementById(id_str).selectedIndex].text;
	const cond_selected_targ_text_field = cond_selected_targ_arr[0] + "_" + cond_selected_targ_arr[1] + "_selected_text";
	const cond_selected_targ_value = document.getElementById(id_str).options[document.getElementById(id_str).selectedIndex].value;
	const cond_selected_targ_value_field = cond_selected_targ_arr[0] + "_" + cond_selected_targ_arr[1] + "_selected_value";

	document.getElementById(cond_selected_targ_text_field).value = cond_selected_targ_text;
	document.getElementById(cond_selected_targ_value_field).value = cond_selected_targ_value;

	console.log("cond_element_id: " + cond_element_id);

	if (cond_selected_targ_text == "Select One") {
		//reset the form
		document.getElementById("retail_calc_label").innerText = "need data";
		document.getElementById("retail_calc").classList.remove("bg-dark");
		document.getElementById("trade_calc_label").innerText = "need data";
		document.getElementById("trade_calc").classList.remove("bg-dark");
		document.getElementById("purchase_calc_label").innerText = "need data";
		document.getElementById("purchase_calc").classList.remove("bg-dark");

		document.getElementById("retail_price_override").classList.remove("border-2");
		document.getElementById("retail_price_override").classList.add("bg-success");
		document.getElementById("retail_price_override").classList.add("bg-opacity-10");
		document.getElementById("trade_price_override").classList.remove("border-2");
		document.getElementById("trade_price_override").classList.add("bg-warning");
		document.getElementById("trade_price_override").classList.add("bg-opacity-10");
		document.getElementById("purchase_price_override").classList.remove("border-2");
		document.getElementById("purchase_price_override").classList.add("bg-primary");
		document.getElementById("purchase_price_override").classList.add("bg-opacity-10");
	} else {
		removeFieldHighlight(document.getElementById(cond_element_id));
	}

	// console.log("cond_selected_targ_arr: " + cond_selected_targ_arr);
	// //console.log("choice_holder: " + choice_holder);
	// console.log("cond_selected_targ_text: " + cond_selected_targ_text);
	// console.log("cond_selected_targ_text_field: " + cond_selected_targ_text_field);
	// console.log("con_selected_targ_value: " + cond_selected_targ_value);
	// console.log("cond_selected_targ_value_field: " + cond_selected_targ_value_field);

	//CLEAN UP THE DISPLAY WARNINGS
	// if (cosmetic_condition_selected_value == 'unset') {
	//   document.getElementById('cosmetic_condition_dropdown').classList.add("bg-danger");
	//   document.getElementById('cosmetic_condition_dropdown').classList.add("bg-opacity-10");
	//   document.getElementById('cosmetic_condition_dropdown').classList.add("border-danger");
	// } else {
	//   document.getElementById('cosmetic_condition_dropdown').classList.remove("bg-danger");
	//   document.getElementById('cosmetic_condition_dropdown').classList.remove("bg-opacity-10");
	//   document.getElementById('cosmetic_condition_dropdown').classList.remove("border-danger");
	// }

	// cond_selected_targ_arr: cosmetic,condition,dropdown
	// cond_selected_targ_text: Near Mint
	// cond_selected_targ_text_field: cosmetic_condition_selected_text
	// con_selected_targ_value: 1.05
	// cond_selected_targ_value_field: cosmetic_condition_selected_value

	// if (!isNaN(cond_selected_targ_value)) {
	// 	document.getElementById(cond_targ).value = cond_selected_targ_value;
	// }
	//document.getElementById(cond_targ).value = selected_value;
	//document.getElementById(cond_targ).value = value_num;

	// let has_cosmetics = getFormFieldValue("has_cosmetics");
	// let has_opticals = getFormFieldValue("has_opticals");
	// let has_mechanicals = getFormFieldValue("has_mechanicals");

	// cosmetic_condition_selected_text
	// optical_condition_selected_text
	// mechanical_condition_selected_text
	// cosmetic_condition_selected_value
	// optical_condition_selected_value
	// mechanical_condition_selected_value

	if (mechanical_condition_selected_text == "Parts Only") {
		//console.log("manual entry only!");
		showFlashMessage('"Parts Only" items require manual pricing entries', "alert-primary", 7000);
		document.getElementById("retail_calc_label").innerText = "manual entry";
		document.getElementById("retail_calc").classList.add("bg-dark");
		document.getElementById("trade_calc_label").innerText = "manual entry";
		document.getElementById("trade_calc").classList.add("bg-dark");
		document.getElementById("purchase_calc_label").innerText = "manual entry";
		document.getElementById("purchase_calc").classList.add("bg-dark");

		document.getElementById("retail_price_override").classList.remove("bg-success");
		document.getElementById("retail_price_override").classList.remove("bg-opacity-10");
		document.getElementById("retail_price_override").classList.add("border-2");

		document.getElementById("trade_price_override").classList.remove("bg-warning");
		document.getElementById("trade_price_override").classList.remove("bg-opacity-10");
		document.getElementById("trade_price_override").classList.add("border-2");

		document.getElementById("purchase_price_override").classList.remove("bg-primary");
		document.getElementById("purchase_price_override").classList.remove("bg-opacity-10");
		document.getElementById("purchase_price_override").classList.add("border-2");

		clearTradePriceWarnings("retail_price_override");
		clearTradePriceWarnings("trade_price_override");
		clearTradePriceWarnings("purchase_price_override");

		document.getElementById("retail_price_override").focus();
	} else {
		updatePricingDisplay();
	}
} //****

function updatePricingDisplay() {
	console.log("-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_");
	console.log("Update Pricing Display");

	let all_conditions_set = false;
	let cosmetic_condition_set = false;
	let optical_condition_set = false;
	let mechanical_condition_set = false;
	let base_price_set = false;
	let trade_percent_set = false;
	let purchase_percent_set = false;
	let denominator = 0;
	let numerator = 0;
	let dropdown_counter = 0;
	let cosmetic_factor = 0;
	let optical_factor = 0;
	let mechanical_factor = 0;
	let retail_price = 0;
	let trade_price = 0;
	let purchase_price = 0;
	// let update_pricing_display = false;
	// let cosmetics_active = false;
	// let opticals_active = false;
	// let mechanicals_active = false;
	// let cosmetics_done = false;
	// let opticals_done = false;
	// let mechanicals_done = false;
	// let entry_numnber = 0;
	const has_cosmetics = getFormFieldValue("has_cosmetics");
	const cosmetic_condition_selected_text = getFormFieldValue("cosmetic_condition_selected_text");
	const cosmetic_condition_selected_value = getFormFieldValue("cosmetic_condition_selected_value");
	const cosmetic_condition_selected_value_tuner = getFormFieldValue("cosmetic_condition_selected_value_tuner");
	const has_opticals = getFormFieldValue("has_opticals");
	const optical_condition_selected_text = getFormFieldValue("optical_condition_selected_text");
	const optical_condition_selected_value = getFormFieldValue("optical_condition_selected_value");
	const optical_condition_selected_value_tuner = getFormFieldValue("optical_condition_selected_value_tuner");
	const has_mechanicals = getFormFieldValue("has_mechanicals");
	const mechanical_condition_selected_text = getFormFieldValue("mechanical_condition_selected_text");
	const mechanical_condition_selected_value = getFormFieldValue("mechanical_condition_selected_value");
	const mechanical_condition_selected_value_tuner = getFormFieldValue("mechanical_condition_selected_value_tuner");
	const base_price_value = Number(document.getElementById("base_price").value);
	const trade_percent_value = Number(document.getElementById("trade_percent").value);
	const purchase_percent_value = Number(document.getElementById("purchase_percent").value);

	if (has_cosmetics == "1") {
		denominator++;
		//entry_numnber++;
		dropdown_counter++;
		//console.log("cosmetic_condition_visible is on");
		if (cosmetic_condition_selected_value == "unset") {
			cosmetic_condition_set = false;
			cosmetic_factor = 1;
			//console.log("cosmetic_condition is not set");
		} else {
			cosmetic_condition_set = true;
			dropdown_counter--;
			cosmetic_factor = calculateTunerFactor(cosmetic_condition_selected_value, cosmetic_condition_selected_value_tuner);
			numerator += Number(cosmetic_condition_selected_value) * Number(cosmetic_factor);

			if (true) {
				// bunch of console debugging
				// console.log("++++++++++++++++++++++++++++++++++++++++++");
				// console.log("numerator var: " + typeof numerator);
				// console.log("numerator: " + numerator);
				// console.log("cosmetic_condition_selected_value var: " + typeof cosmetic_condition_selected_value);
				// console.log("cosmetic_condition_selected_value: " + cosmetic_condition_selected_value);
				// console.log("cosmetic_factor var: " + typeof cosmetic_factor);
				// console.log("cosmetic_factor: " + cosmetic_factor);
				// console.log("optical_condition_selected_value var: " + typeof optical_condition_selected_value);
				// console.log("optical_condition_selected_value: " + optical_condition_selected_value);
				// console.log("mechanical_condition_selected_value var: " + typeof mechanical_condition_selected_value);
				// console.log("mechanical_condition_selected_value: " + mechanical_condition_selected_value);
				//console.log("cosmetic_condition is set");
				// console.log("++++++++++++++++++++++++++++++++++++++++++");
				// console.log("");
				// console.log("");
			}
		}
	} else {
		cosmetic_condition_set = true;
		cosmetic_factor = 1;
	}

	if (has_opticals == "1") {
		denominator++;
		// entry_numnber++;
		dropdown_counter++;
		//console.log("optical_condition_visible is on");
		if (optical_condition_selected_value == "unset") {
			optical_condition_set = false;
			optical_factor = 1;
			//console.log("optical_condition is not set");
		} else {
			optical_condition_set = true;
			dropdown_counter--;
			optical_factor = calculateTunerFactor(optical_condition_selected_value, optical_condition_selected_value_tuner);
			numerator += Number(optical_condition_selected_value) * Number(optical_factor);
			//console.log("optical_condition is set");
		}
	} else {
		optical_condition_set = true;
		optical_factor = 1;
	}

	if (has_mechanicals == "1") {
		denominator++;
		//entry_numnber++;
		dropdown_counter++;
		// console.log("mechanical_condition_visible is on");
		if (mechanical_condition_selected_value == "unset") {
			mechanical_condition_set = false;
			mechanical_factor = 1;
			// console.log("mechanical_condition is not set");
		} else {
			mechanical_condition_set = true;
			dropdown_counter--;
			mechanical_factor = calculateTunerFactor(mechanical_condition_selected_value, mechanical_condition_selected_value_tuner);
			numerator += Number(mechanical_condition_selected_value) * Number(mechanical_factor);
			// console.log("mechanical_condition is set");
		}
	} else {
		mechanical_condition_set = true;
		mechanical_factor = 1;
	}

	if (base_price_value != 0) {
		base_price_set = true;
	}
	if (trade_percent_value != 0) {
		trade_percent_set = true;
	}
	if (purchase_percent_value != 0) {
		purchase_percent_set = true;
	}

	if (mechanical_condition_set && optical_condition_set && cosmetic_condition_set && base_price_set && trade_percent_set && purchase_percent_set) {
		all_conditions_set = true;
	}

	if (all_conditions_set) {
		//calculate prices
		let retail_price = priceToFive(base_price_value * (numerator / denominator)).toFixed(2);

		let trade_price = priceToZero(retail_price * (trade_percent_value / 100)).toFixed(2);
		let purchase_price = priceToZero(retail_price * (purchase_percent_value / 100)).toFixed(2);

		let retail_currency = Number(retail_price).toLocaleString("en-US", { style: "currency", currency: "USD" });
		let trade_currency = Number(trade_price).toLocaleString("en-US", { style: "currency", currency: "USD" });
		let purchase_currency = Number(purchase_price).toLocaleString("en-US", { style: "currency", currency: "USD" });

		console.log("retail_price: " + retail_price);
		console.log("retail_price type :" + typeof retail_price);
		console.log("retail_price currency: " + retail_currency);

		console.log("trade_price: " + trade_price);
		console.log("trade_price: " + typeof trade_price);
		console.log("trade_price currency: " + trade_currency);
		console.log("purchase_price: " + purchase_price);
		console.log("purchase_price type :" + typeof purchase_price);
		console.log("purchase_price currency: " + purchase_currency);

		clearTradePriceWarnings("retail_price_override");
		clearTradePriceWarnings("trade_price_override");
		clearTradePriceWarnings("purchase_price_override");

		document.getElementById("retail_calc_label").innerHTML = retail_currency;
		document.getElementById("retail_price_override").value = retail_currency;
		document.getElementById("trade_calc_label").innerHTML = trade_currency;
		document.getElementById("trade_price_override").value = trade_currency;
		document.getElementById("purchase_calc_label").innerHTML = purchase_currency;
		document.getElementById("purchase_price_override").value = purchase_currency;

		// document.getElementById("retail_calc_label").innerHTML = retail_price.toLocaleString("en-US", { style: "currency", currency: "USD" });
		// document.getElementById("retail_price_override").value = retail_price.toLocaleString("en-US", { style: "currency", currency: "USD" });
		// document.getElementById("trade_calc_label").innerHTML = trade_price.toLocaleString("en-US", { style: "currency", currency: "USD" });
		// document.getElementById("trade_price_override").value = trade_price.toLocaleString("en-US", { style: "currency", currency: "USD" });
		// document.getElementById("purchase_calc_label").innerHTML = purchase_price.toLocaleString("en-US", { style: "currency", currency: "USD" });
		// document.getElementById("purchase_price_override").value = purchase_price.toLocaleString("en-US", { style: "currency", currency: "USD" });
	} else {
		document.getElementById("retail_calc_label").innerHTML = "need data";
		document.getElementById("trade_calc_label").innerHTML = "need data";
		document.getElementById("purchase_calc_label").innerHTML = "need data";
		document.getElementById("retail_price_override").value = "";
		document.getElementById("trade_price_override").value = "";
		document.getElementById("purchase_price_override").value = "";
	}

	console.log("---------------------------------------------------");
	//optical_condition_selected_value;
	//mechanical_condition_selected_value;
	console.log(" ");

	console.log("has_cosmetics: " + has_cosmetics);
	console.log("has_opticals: " + has_opticals);
	console.log("has_mechanicals: " + has_mechanicals);
	console.log(" ");
	console.log("cosmetic_condition_selected_value: " + cosmetic_condition_selected_value);
	console.log("cosmetic_condition_selected_value_tuner: " + cosmetic_condition_selected_value_tuner);
	console.log("cosmetic_condition_selected_text: " + cosmetic_condition_selected_text);
	console.log("optical_condition_selected_value: " + optical_condition_selected_value);
	console.log("optical_condition_selected_value_tuner: " + optical_condition_selected_value_tuner);
	console.log("optical_condition_selected_text: " + optical_condition_selected_text);
	console.log("mechanical_condition_selected_value: " + mechanical_condition_selected_value);
	console.log("mechanical_condition_selected_value_tuner: " + mechanical_condition_selected_value_tuner);
	console.log("mechanical_condition_selected_text: " + mechanical_condition_selected_text);
	console.log(" ");
	console.log("cosmetic_condition_set: " + cosmetic_condition_set);
	console.log("optical_condition_set: " + optical_condition_set);
	console.log("mechanical_condition_set: " + mechanical_condition_set);
	console.log("base_price_set: " + base_price_set);
	console.log("trade_percent_set: " + trade_percent_set);
	console.log("purchase_percent_set: " + purchase_percent_set);
	console.log("all_conditions_set: " + all_conditions_set);
	console.log(" ");
	console.log("denominator: " + denominator);
	console.log("numerator: " + numerator);
	console.log("base price: " + base_price_value);
	console.log("trade factor: " + trade_percent_value);
	console.log("purchase factor: " + purchase_percent_value);
	console.log("retail_price: " + retail_price);
	console.log("trade_price: " + trade_price);
	console.log("purchase_price: " + purchase_price);
	console.log("---------------------------------------------------");
} //****

function switchOpticalConditionSelector(state_btn) {
	console.log("switchOpticalConditionSelector");
	console.log("state_btn: " + state_btn);
	if (state_btn == false) {
		document.getElementById("optical_condition_dropdown").value = "Select One";
		document.getElementById("optical_condition_dropdown").value = "unset";

		document.getElementById("optical_condition_true_btn").classList.add("visually-hidden");
		document.getElementById("optical_condition_dropdown_set").classList.add("visually-hidden");
		document.getElementById("optical_condition_dropdown").tabIndex = "-1";
		document.getElementById("optical_condition_false_btn").classList.remove("visually-hidden");
		document.getElementById("optical_condition_selected_value").value = "unset";
		document.getElementById("optical_condition_selected_text").value = "Select One";
		document.getElementById("has_opticals").value = "0";
	} else {
		document.getElementById("optical_condition_true_btn").classList.remove("visually-hidden");
		document.getElementById("optical_condition_dropdown_set").classList.remove("visually-hidden");
		document.getElementById("optical_condition_dropdown").tabIndex = "2";
		document.getElementById("optical_condition_false_btn").classList.add("visually-hidden");
		document.getElementById("has_opticals").value = "1";
	}
	updatePricingDisplay();
} //****

function switchMechanicalConditionSelector(state_btn) {
	console.log("switchMechanicalConditionSelector");
	console.log("state_btn: " + state_btn);
	if (state_btn == false) {
		document.getElementById("mechanical_condition_dropdown").text = "Select One";
		document.getElementById("mechanical_condition_dropdown").value = "unset";

		document.getElementById("mechanical_condition_true_btn").classList.add("visually-hidden");
		document.getElementById("mechanical_condition_dropdown_set").classList.add("visually-hidden");
		document.getElementById("mechanical_condition_dropdown").tabIndex = "-1";
		document.getElementById("mechanical_condition_false_btn").classList.remove("visually-hidden");
		document.getElementById("mechanical_condition_selected_value").value = "unset";
		document.getElementById("mechanical_condition_selected_text").value = "Select One";
		document.getElementById("has_mechanicals").value = "0";
	} else {
		document.getElementById("mechanical_condition_true_btn").classList.remove("visually-hidden");
		document.getElementById("mechanical_condition_dropdown_set").classList.remove("visually-hidden");
		document.getElementById("mechanical_condition_dropdown_set").tabIndex = "3";
		document.getElementById("mechanical_condition_false_btn").classList.add("visually-hidden");
		document.getElementById("has_mechanicals").value = "1";
	}
	updatePricingDisplay();
} //****

function confirmTradeItem() {
	console.log("fired the confirm trade funtion");

	const item_title = getFormFieldValue("item_title");
	const medium_description = getFormFieldValue("medium_description");
	const long_description = getFormFieldValue("long_description");
	const comments = getFormFieldValue("comments");
	const nce_note = getFormFieldValue("nce_note");
	const categories = getFormFieldValue("categories");
	const attributes = getFormFieldValue("attributes");
	const vsn = getFormFieldValue("vsn");
	const minor = getFormFieldValue("minor");
	const family = getFormFieldValue("family");
	const serial_number = getFormFieldValue("serial_number");
	const has_cosmetics = getFormFieldValue("has_cosmetics");
	const has_opticals = getFormFieldValue("has_opticals");
	const has_mechanicals = getFormFieldValue("has_mechanicals");
	const cosmetic_condition_selected_text = document.getElementById("cosmetic_condition_dropdown").options[document.getElementById("cosmetic_condition_dropdown").selectedIndex].text;
	const optical_condition_selected_text = document.getElementById("optical_condition_dropdown").options[document.getElementById("optical_condition_dropdown").selectedIndex].text;
	const mechanical_condition_selected_text = document.getElementById("mechanical_condition_dropdown").options[document.getElementById("mechanical_condition_dropdown").selectedIndex].text;
	const cosmetic_condition_selected_value = document.getElementById("cosmetic_condition_dropdown").options[document.getElementById("cosmetic_condition_dropdown").selectedIndex].value;
	const optical_condition_selected_value = document.getElementById("optical_condition_dropdown").options[document.getElementById("optical_condition_dropdown").selectedIndex].value;
	const mechanical_condition_selected_value = document.getElementById("mechanical_condition_dropdown").options[document.getElementById("mechanical_condition_dropdown").selectedIndex].value;
	const cosmetic_condition_selected_value_tuner = getFormFieldValue("cosmetic_condition_selected_value_tuner");
	const optical_condition_selected_value_tuner = getFormFieldValue("optical_condition_selected_value_tuner");
	const mechanical_condition_selected_value_tuner = getFormFieldValue("mechanical_condition_selected_value_tuner");
	const retail_price_override = getFormFieldValue("retail_price_override");
	const trade_price_override = getFormFieldValue("trade_price_override");
	const purchase_price_override = getFormFieldValue("purchase_price_override");
	const ebay_search = getFormFieldValue("ebay_search");
	let error_list = [];
	let error_message = "";
	let error_flag = false;
	let temp_flash_data = [];

	// console.log("^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^");
	// //console.log("trade_sheet_id: ", trade_sheet_id);
	// console.log("item_title: ", item_title);
	// console.log("medium_description: ", medium_description);
	// console.log("long_description: ", long_description);
	// console.log("comments: ", comments);
	// console.log("nce_note: ", nce_note);
	// console.log("categories: ", categories);
	// console.log("attributes: ", attributes);
	// console.log("vsn: ", vsn);
	// console.log("minor: ", minor);
	// console.log("family: ", family);
	// console.log("serial_number: " + serial_number);

	// console.log("has_cosmetics: ", has_cosmetics);
	// console.log("has_opticals: ", has_opticals);
	// console.log("has_mechanicals: ", has_mechanicals);
	// console.log("cosmetic_condition_selected_text: ", cosmetic_condition_selected_text);
	// console.log("optical_condition_selected_text: ", optical_condition_selected_text);
	// console.log("mechanical_condition_selected_text: ", mechanical_condition_selected_text);
	// console.log("cosmetic_condition_selected_value: ", cosmetic_condition_selected_value);
	// console.log("optical_condition_selected_value: ", optical_condition_selected_value);
	// console.log("mechanical_condition_selected_value: ", mechanical_condition_selected_value);
	// console.log("cosmetic_condition_selected_value_tuner: ", cosmetic_condition_selected_value_tuner);
	// console.log("optical_condition_selected_value_tuner: ", optical_condition_selected_value_tuner);
	// console.log("mechanical_condition_selected_value_tuner: ", mechanical_condition_selected_value_tuner);

	// console.log("retail_price: ", retail_price_override);
	// console.log("trade_price: ", trade_price_override);
	// console.log("purchase_price: ", purchase_price_override);

	// console.log("ebay_search: ", ebay_search);

	//******************************/
	//***** Manage Missing Data ****/
	//******************************/

	//CHECK SERIAL NUMBER
	if (serial_number == "") {
		addFieldHighlight(document.getElementById("serial_num_container"));
		error_flag = true;
		temp_flash_data = addToFlashMessage(error_list, error_message, "no-serial", "<br>Must Enter a Serial Number");
		error_list = temp_flash_data[0];
		error_message = temp_flash_data[1];
		temp_flash_data = [];
	}
	//CHECK COSMETICS SELECTION
	if (has_cosmetics == "1") {
		if (cosmetic_condition_selected_text == "Select One") {
			addFieldHighlight(document.getElementById("cosmetic_condition_dropdown"));
			error_flag = true;
			temp_flash_data = addToFlashMessage(error_list, error_message, "no-cosmetic", "<br>Must Select a Cosmetic Condition");
			error_list = temp_flash_data[0];
			error_message = temp_flash_data[1];
			temp_flash_data = [];
		}
	}
	//CHECK OPTICAL SELECTION
	if (has_opticals == "1") {
		if (optical_condition_selected_text == "Select One") {
			addFieldHighlight(document.getElementById("optical_condition_dropdown"));
			error_flag = true;
			temp_flash_data = addToFlashMessage(error_list, error_message, "no-optical", "<br>Must Select an Optical Condition");
			error_list = temp_flash_data[0];
			error_message = temp_flash_data[1];
			temp_flash_data = [];
		}
	}
	//CHECK MECHANICAL SELECTION
	if (has_mechanicals == "1") {
		if (mechanical_condition_selected_text == "Select One") {
			addFieldHighlight(document.getElementById("mechanical_condition_dropdown"));
			error_flag = true;
			temp_flash_data = addToFlashMessage(error_list, error_message, "no-mechanical", "<br>Must Select a Mechanical Condition");
			error_list = temp_flash_data[0];
			error_message = temp_flash_data[1];
			temp_flash_data = [];
		}
	}
	//CHECK RETAIL PRICE OVERRIDE
	if (retail_price_override == "") {
		addFieldHighlight(document.getElementById("retail_price_override"));
		error_flag = true;
		temp_flash_data = addToFlashMessage(error_list, error_message, "no-retail", "<br>Must Include a Retail Price");
		error_list = temp_flash_data[0];
		error_message = temp_flash_data[1];
		temp_flash_data = [];
	}
	//CHECK TRADE PRICE OVERRIDE
	if (trade_price_override == "") {
		addFieldHighlight(document.getElementById("trade_price_override"));
		error_flag = true;
		temp_flash_data = addToFlashMessage(error_list, error_message, "no-trade", "<br>Must Include a Trade Price");
		error_list = temp_flash_data[0];
		error_message = temp_flash_data[1];
		temp_flash_data = [];
	}
	//CHECK PURCHASE PRICE OVERRIDE
	if (purchase_price_override == "") {
		addFieldHighlight(document.getElementById("purchase_price_override"));
		error_flag = true;
		temp_flash_data = addToFlashMessage(error_list, error_message, "no-purchase", "<br>Must Include a Purchase Price");
		error_list = temp_flash_data[0];
		error_message = temp_flash_data[1];
		temp_flash_data = [];
	}

	// temp_flash_data = removeFromFlashMessage(error_list, error_message, 'no-optical', "<br>Must Select an Optical Condition");
	// error_list = temp_flash_data[0];
	// error_message = temp_flash_data[1];
	// temp_flash_data = [];

	// console.log("TESTING FLASH MESSAGE BUILD");
	// console.log("testing error list: " + error_list);
	// console.log("testing error messages: " + error_message);
	// console.log("temp_flash_data: " + temp_flash_data);

	if (error_flag) {
		showFlashMessage(error_message, (style = "alert-danger"), (pause = 6500));
	} else {
		//console.log("READY FOR THE TRADE SHEET");
		document.getElementById("confirm_trade_item_form").submit();
	}
} //****

function addTradeItemBtn() {
	document.getElementById("add_another_trade_item").submit();
	//window.location.href = "trades/continue";
} //****

function newTradeItemBtn() {
	window.location.href = "./trade_item_new";
} //****

function editTradeItem(id_str) {
	console.log("editTradeItem: ", id_str);
} //****

// custom button needs to be renamed (when the use case is found)
function editTradeLutItemBtn() {
	console.log(`pages load data: ${document.URL} `);
	const urlArr = document.URL.split("/");
	lut_item_id = document.getElementById("lut_item_id").value;
	console.log(`lut_item_id: ${lut_item_id} `);
	if (lut_item_id != "") {
		edit_url = urlArr[0] + "//" + urlArr[2] + "/" + urlArr[3] + "/" + "trades/lut_item_edit/" + lut_item_id;
		console.log(`good to go`);
		window.location.href = edit_url;
	} else {
		showFlashMessage("Please enter a LUT Item ID Number to continue.", "alert-danger", 4000);
	}
} //****

  function printTradeForCustomer() {	//
	// document.getElementById("print_for_customer_btn").addEventListener("click", function(event){
	// 	event.preventDefault()
	//   });
	  $('#print_for_customer_btn').off('click');
	  document.getElementById("print_type").value = "customer";
	  document.getElementById("print_data").submit();

} //****

function printTradeForStore() {
	document.getElementById("print_type").value = "store";
	document.getElementById("print_data").submit();
} //****

function startNewTradeSheet() {
	pageLoad(getURLRoot() + "/trades/start");
	//pageLoad(this_url);
	//http://checkAppSecurity/nceapps/trades/start
} //****

// ***************************************
// CUSTOM BUTTONS
// ***************************************//

function setTradeRadioButtons(clicked_id) {
	switch (clicked_id) {
		case "purchase_transaction":
			document.getElementById("quote_transaction_label").classList.add("bg-opacity-25");
			document.getElementById("quote_transaction_label").classList.remove("bg-opacity-75");
			document.getElementById("quote_transaction_label").classList.add("text-primary");
			document.getElementById("quote_transaction_label").classList.remove("text-dark");
			document.getElementById("trade_transaction_label").classList.remove("bg-opacity-75");
			document.getElementById("trade_transaction_label").classList.add("bg-opacity-25");
			document.getElementById("trade_transaction_label").classList.remove("text-dark");
			document.getElementById("trade_transaction_label").classList.add("text-warning");
			document.getElementById("purchase_transaction_label").classList.add("bg-opacity-75");
			document.getElementById("purchase_transaction_label").classList.remove("bg-opacity-25");
			document.getElementById("purchase_transaction_label").classList.add("text-dark");
			document.getElementById("purchase_transaction_label").classList.remove("text-success");
			break;
		case "trade_transaction":
			document.getElementById("quote_transaction_label").classList.add("bg-opacity-25");
			document.getElementById("quote_transaction_label").classList.remove("bg-opacity-75");
			document.getElementById("quote_transaction_label").classList.add("text-primary");
			document.getElementById("quote_transaction_label").classList.remove("text-dark");
			document.getElementById("trade_transaction_label").classList.add("bg-opacity-75");
			document.getElementById("trade_transaction_label").classList.remove("bg-opacity-25");
			document.getElementById("trade_transaction_label").classList.add("text-dark");
			document.getElementById("trade_transaction_label").classList.remove("text-warning");
			document.getElementById("purchase_transaction_label").classList.remove("bg-opacity-75");
			document.getElementById("purchase_transaction_label").classList.add("bg-opacity-25");
			document.getElementById("purchase_transaction_label").classList.remove("text-dark");
			document.getElementById("purchase_transaction_label").classList.add("text-success");
			break;
		default:
			document.getElementById("quote_transaction_label").classList.remove("bg-opacity-25");
			document.getElementById("quote_transaction_label").classList.add("bg-opacity-75");
			document.getElementById("quote_transaction_label").classList.remove("text-primary");
			document.getElementById("quote_transaction_label").classList.add("text-dark");
			document.getElementById("trade_transaction_label").classList.remove("bg-opacity-75");
			document.getElementById("trade_transaction_label").classList.add("bg-opacity-25");
			document.getElementById("trade_transaction_label").classList.remove("text-dark");
			document.getElementById("trade_transaction_label").classList.add("text-warning");
			document.getElementById("purchase_transaction_label").classList.remove("bg-opacity-75");
			document.getElementById("purchase_transaction_label").classList.add("bg-opacity-25");
			document.getElementById("purchase_transaction_label").classList.remove("text-dark");
			document.getElementById("purchase_transaction_label").classList.add("text-success");
	}
} //****

function checkEbay(this_item) {
	let item_url_str = this_item.replace(/ /gi, "+");
	console.log("item_url_str: " + item_url_str);
	const this_ur = "https://www.ebay.com/sch/i.html?_from=R40&_nkw=" + item_url_str + "&_sacat=0&LH_TitleDesc=0&LH_BIN=1&LH_PrefLoc=1&LH_Complete=1&LH_Sold=1&LH_ItemCondition=3000&rt=nc&LH_AS=1";
	//const this_ur = 'https://www.ebay.com/sch/i.html?_fsrp=1&_from=R40&LH_ItemCondition=3000&LH_Complete=1&LH_All=1&LH_Sold=1&_nkw=' + item_url_str + '&_sacat=0&_fss=1&LH_SellerWithStore=1&_sop=16&_dmd=1&rt=nc&LH_PrefLoc=3';
	window.open(this_ur, "_blank");
} //****

function returnToLastPage() {
	//console.log('jump back to last page');
	window.history.back();
}

// ***************************************
// THE LITTLE CUSTOM UP DOWN BUTTONS
// ***************************************//

function clickUp(target) {
	targ_element = document.getElementById(target);

	const base_price = document.getElementById("base_price_entry").value;
	let base_length = base_price.length;
	//console.log("base_length: " + base_length);
	let step_value = 0.1;
	if (base_length <= 2) {
		step_value = 5;
	} else if (base_length == 3) {
		step_value = 1;
	}

	newNum = parseFloat(targ_element.value) + step_value;
	if (newNum < 100) {
		if (newNum > 0) {
			newValue = newNum.toFixed(2);
		} else {
			newValue = 0;
		}
	} else {
		newValue = 100;
	}
	targ_element.value = newValue;
}

function clickDown(target) {
	targ_element = document.getElementById(target);

	const base_price = document.getElementById("base_price_entry").value;
	let base_length = base_price.length;
	//console.log("base_length: " + base_length);
	let step_value = 0.1;
	if (base_length <= 2) {
		step_value = 5;
	} else if (base_length == 3) {
		step_value = 1;
	}

	newNum = parseFloat(targ_element.value) - step_value;
	if (newNum < 100) {
		if (newNum > 0) {
			newValue = newNum.toFixed(2);
		} else {
			newValue = 0;
		}
	} else {
		newValue = 100;
	}

	targ_element.value = newValue;
}

// ***************************************
// UPDATE CALCULATED FIELDS
// ***************************************//

function updatePercentage() {
	updatePriceMatrix();
}

function updateBasePrice() {
	document.getElementById("base_price_value").value = document.getElementById("base_price_entry").value;
	updatePriceMatrix();
}

function afterClickPercent(target) {
	updatePriceMatrix();
}

function afterClickCondition(target) {}

function updatePriceMatrix() {
	// "100-(100*.40)"
	console.log("running updatePriceMatrix");

	document.getElementById("base_price_value").value = document.getElementById("base_price_entry").value;
	document.getElementById("trade_percent_value").value = document.getElementById("trade_percent_entry").value;
	document.getElementById("purchase_percent_value").value = document.getElementById("purchase_percent_entry").value;

	const base_price_entry = parseFloat(document.getElementById("base_price_value").value);
	const trade_percent_entry = parseFloat(document.getElementById("trade_percent_value").value);
	const purchase_percent_entry = parseFloat(document.getElementById("purchase_percent_value").value);

	const cosmetic_condition_selected_value = parseFloat(document.getElementById("cosmetic_condition_selected_value").value);
	const cosmetic_condition_tuner_value = parseFloat(document.getElementById("cosmetic_condition_tuner_value").value);
	const optical_condition_selected_value = parseFloat(document.getElementById("optical_condition_selected_value").value);
	const optical_condition_tuner_value = parseFloat(document.getElementById("optical_condition_tuner_value").value);

	const mechanical_condition_selected_value = parseFloat(document.getElementById("mechanical_condition_selected_value").value);
	const mechanical_condition_tuner_value = parseFloat(document.getElementById("mechanical_condition_tuner_value").value);

	if (base_prince_entry > 0 && trade_percent_entry > 0 && purchase_percent_entry > 0) {
		//calculate condition matrix value(s)
		//const raw_retail_calc = base_prince_entry;
		//factor in the condition settings for the retail calc (and that effects the others)
		//updateMatrixValue(this_value, this_target);

		let cosmetic_factor = 0;
		let optical_factor = 0;
		let mechanical_factor = 0;
		let denominator = 0;

		if (document.getElementById("has_cosmetics").value == "1") {
			cosmetic_factor = calculateTunerFactor(cosmetic_condition_selected_value, cosmetic_condition_tuner_value);
			denominator++;
		} else {
			cosmetic_factor = 0;
		}
		if (document.getElementById("has_opticals").value == "1") {
			optical_factor = calculateTunerFactor(optical_condition_selected_value, optical_condition_tuner_value);
			denominator++;
		} else {
			optical_factor = 0;
		}
		if (document.getElementById("has_mechanicals").value == "1") {
			mechanical_factor = calculateTunerFactor(mechanical_condition_selected_value, mechanical_condition_tuner_value);
			denominator++;
		} else {
			mechanical_factor = 0;
		}

		// console.log("cosmetic_factor: " + cosmetic_factor);
		// console.log("optical_factor: " + optical_factor);
		// console.log("mechanical_factor: " + mechanical_factor);
		// console.log("denominator: " + denominator);

		const raw_retail_calc = base_price_value * ((cosmetic_factor + optical_factor + mechanical_factor) / denominator);

		const raw_trade_calc = raw_retail_calc * (trade_percent_entry / 100);
		const raw_purchase_calc = raw_retail_calc * (purchase_percent_entry / 100);

		let this_retail_calc = priceToFive(raw_retail_calc);
		let this_trade_calc = priceToFive(raw_trade_calc);
		let this_purchase_calc = priceToFive(raw_purchase_calc);

		document.getElementById("retail_calc").value = formatCurrency(this_retail_calc);
		document.getElementById("trade_calc").value = formatCurrency(this_trade_calc);
		document.getElementById("purchase_calc").value = formatCurrency(this_purchase_calc);

		document.getElementById("retail_price_value").value = this_retail_calc;
		document.getElementById("trade_price_value").value = this_trade_calc;
		document.getElementById("purchase_price_value").value = this_purchase_calc;
	} else {
		console.log("missing data");
	}
}

function clickClicker(target) {
	//let newArr = target.split("_");
	//let changeDir = newArr[4];
	// document.getElementById(target).classList.remove("carat-down");
	let direction = target.classList[1].split("-")[2];

	let parent = target.parentElement.parentElement.childNodes[1];
	// console.log("clickClicker parent: " + parent.id);
	// console.log("clickClicker parent-value: " + document.getElementById(parent.id).value);
	// console.log("direction: " + direction);

	updateConditionMatrixDisplay(parent);

	let thisNum = document.getElementById(parent.id).value;
	let newNum = 0;
	if (direction == "up") {
		newNum = Number(thisNum) + 0.01;
	} else {
		newNum = Number(thisNum) - 0.01;
	}

	// console.log("newNum: " + newNum.toFixed(2));
	document.getElementById(parent.id).value = newNum.toFixed(2);
	updatePriceMatrix();
} //****

function clickPercentClicker(target) {
	//   let newArr = target.split("_");
	//   let changeDir = newArr[4];
	//   document.getElementById(target).classList.remove("carat-down");
	//   //let parent = document.getElementById(target).parentElement.parentElement.childNodes;
	//   let parent = document.getElementById(target).parentElement.parentElement.childNodes[3].id;
	//   let thisNum = document.getElementById(target).parentElement.parentElement.childNodes[3].value;
	//   let newNum = 0;
	//   if (changeDir == "up") {
	//     newNum = Number(thisNum) + .5;
	//   } else {
	//     newNum = Number(thisNum) - .5;
	//   }
	//   formatEntryFloat(parent, newNum);
} //****

// ***************************************
// ITEM DESCRIPTION UPDATES
// ***************************************//

function fillMediumDescription() {
	document.getElementById("medium_description").value = document.getElementById("short_description").value;
	characterCounter("medium_description");
} //****

function fillLongDescription() {
	document.getElementById("long_description").value = document.getElementById("medium_description").value;
	characterCounter("long_description");
} //****

function characterCounter(descFieldId) {
	let counter = document.getElementById(descFieldId).value.length;
	let maxChars = 0;
	let warnNum = 0;
	let criticalNum = 0;
	let displayTarget = descFieldId + "_char_count";
	let counterClass = "text-success small";
	switch (descFieldId) {
		case "long_description":
			maxChars = 255;
			warnNum = 25;
			criticalNum = 16;
			break;
		case "medium_description":
			maxChars = 80;
			warnNum = 19;
			criticalNum = 8;
			break;
		case "short_description":
			maxChars = 30;
			warnNum = 10;
			criticalNum = 5;
			break;
		default:
			maxChars = 0;
			warnNum = 0;
			criticalNum = 0;
	}
	let charactersLeft = maxChars - counter;
	if (charactersLeft <= 1) {
		counterClass = "text-danger small";
	} else if (charactersLeft <= criticalNum) {
		counterClass = "text-warning small";
	} else if (charactersLeft <= warnNum) {
		counterClass = "text-primary small";
	} else {
		counterClass = "text-success small";
	}
	document.getElementById(displayTarget).innerHTML = '<p class="' + counterClass + '">' + counter + " of " + maxChars + "</p>";
} //****

function enterUpdatedMediumDescription(this_entry, found_text) {
	const start_text = document.getElementById("medium_description_entry").value.toUpperCase();

	console.log("enterUpdatedMediumDescription - this_entry: " + this_entry);
	console.log("enterUpdatedMediumDescription - found_text: " + found_text);
	console.log("enterUpdatedMediumDescription - start_text: " + start_text);

	document.getElementById("medium_description_entry").value = start_text.slice(0, start_text.lastIndexOf(found_text)) + this_entry;
	document.getElementById("medium_description_livesearch").classList.add("visually-hidden");
	document.getElementById("medium_description_livesearch").innerHTML = "";
	document.getElementById("medium_description_entry").focus();
} //****

// ***************************************
// LUT ITEM UPDATES
// ***************************************//

function captureSerialNum(this_entry) {
	//this_field = document.getElementById("serial_num_entry")
	document.getElementById("serial_number").value = this_entry;
	if (this_entry != "") {
		removeFieldHighlight(document.getElementById("serial_num_container"));
	}
} //****

function setSerialNumToNone() {
	this_field = document.getElementById("serial_num_entry");
	// this_field_label = document.getElementById("serial_num_label");

	//console.log("serial_num.value: " + this_field.value);
	if (this_field.disabled == true) {
		//console.log("serial num is disabled so we turn it on");
		this_field.disabled = false;
		this_field.value = "";
		document.getElementById("serial_number").value = "";
		// 	//this_field_label.innerHTML = "Serial Number";
	} else {
		//console.log("serial num is enabled so we turn it off");
		this_field.disabled = true;
		this_field.value = "no serial number";
		document.getElementById("serial_number").value = "no serial number";
		removeFieldHighlight(document.getElementById("serial_num_container"));
		// 	//this_field_label.innerHTML = "no serial number";
	}
} //****

function updateItemTitle(string) {
	document.getElementById("item-header").innerHTML = string;
	document.getElementById("item-header-sub").innerHTML = string;
} //****

function formatEntryFloat(target, input) {
	let clean = Number(input);
	if (clean < 0) {
		clean = 0;
	}
	let formattedStr = clean.toLocaleString("en-US", {
		style: "decimal",
		minimumFractionDigits: 2,
		maximumFractionDigits: 2,
	});
	document.getElementById(target).value = formattedStr;
} //****

function clearMatrixDisplay(condition_set) {
	//console.log("clearMatrixDisplay: " + condition_set);
	const entries_str = "menu_" + condition_set;
	const entries_element = document.getElementById(entries_str);
	for (let i = 0; i < entries_element.options.length; i++) {
		//console.log(entries_element.options[i].value + "_entry");
		document.getElementById(entries_element.options[i].value + "_entry").classList.remove("border", "border-3", "border-primary", "shadow-2-strong", "bg-primary", "bg-opacity-10");
	}
} //****

function formatMatrixField(element) {
	//let entry = document.getElementById(target).value;
	document.getElementById(element).classList.add("border", "border-3", "border-primary", "shadow-2-strong", "bg-primary", "bg-opacity-10");
} //****

function updateDropdownDisplay(index) {
	let newArr = index.split("_");
	let theMenu = newArr[1] + "_condition_dropdown";
	let theSelection = "condition_" + newArr[1] + "_" + newArr[2];
} //****

function updateConditionDropDownEntryDisplay(this_element) {
	//console.log("updateConditionDropDownEntryDisplay: " + this_element.id);
	let value_arr = document.getElementById(this_element.id).value.split("_");

	clearMatrixDisplay(value_arr[1]);
	let entry_target = value_arr[0] + "_" + value_arr[1] + "_" + value_arr[2] + "_entry";

	//console.log("updateConditionDropDownEntryDisplay: " + value_arr);
	formatMatrixField(entry_target);

	//condition_cosmetic_mint_entry
	//condition_cosmetic_nearmint_entry
	//console.log("entry_target: " + entry_target);
	updateHiddenConditionSelectionValue(entry_target);

	//classList.add(hilight_classes);
	// let conditionMainFactorNumber = document.getElementById(selectedStr).value;
	// let conditionSelectionHolder = nameArr[1] + "_" + nameArr[0] + "_selected";
	// let indexFactorHolder = nameArr[1] + "_" + nameArr[0] + "_selected_value";
	// document.getElementById(conditionSelectionHolder).value = nameArr[2];
	// clearMatrixDisplay(selectedStr);
	// formatMatrixField(selectedStr);
	//calculateComplexPriceMatrix();
} //****

function toggleCondtionDropdown(item_id) {
	const item_id_arr = item_id.split("_");
	const switch_id = item_id;
	const switch_label_id = item_id + "_label";
	const set_id = item_id_arr[0] + "_" + item_id_arr[2] + "_set";
	const dropdown_selector_id = item_id_arr[0] + "_" + item_id_arr[1] + "_" + item_id_arr[2];
	const text_entry = item_id_arr[0].replace(item_id_arr[0].slice(0, 1), item_id_arr[0].slice(0, 1).toUpperCase());
	let current_state = document.getElementById(set_id).classList.contains("visually-hidden");
	if (current_state) {
		document.getElementById(set_id).classList.remove("visually-hidden");
		document.getElementById(switch_label_id).innerHTML = "Hide " + text_entry + " Condition Selector";
		document.getElementById(switch_id).checked = true;
		document.getElementById(dropdown_selector_id).focus();
	} else {
		document.getElementById(set_id).classList.add("visually-hidden");
		document.getElementById(switch_label_id).innerHTML = "Show " + text_entry + " Condition Selector";
		document.getElementById(switch_id).checked = false;
		document.getElementById(switch_id).blur();
	}
} //****

function updateConditonDropdown(this_id) {
	id_arr = this_id.split("_");
	//condition_cosmetic_mint_entry
	//console.log("updateConditonDropdown: " + this_id);

	document.getElementById("menu_" + id_arr[1]).value = "condition_" + id_arr[1] + "_" + id_arr[2];
} //****

function updateConditionMatrixDisplay(this_element) {
	console.log("updateConditionMatrixDisplay: " + this_element.id);
	//const new_value = this_element.value;
	const element_array = this_element.id.split("_");
	//console.log("element_array: " + element_array);
	clearMatrixDisplay(element_array[1]);
	//let entry_target = value_arr[0] + "_" + value_arr[1] + "_" + value_arr[2] + "_entry";
	formatMatrixField(this_element.id);
	updateConditonDropdown(this_element.id);
	updateHiddenConditionSelectionValue(this_element.id);
} //****

function XXXXupdateConditionEntryFieldMatrix(this_element) {
	//   console.log("updateConditionEntryFieldMatrix: " + this_element.id);
	//   //console.log("updateConditionEntryFieldMatrix: " + this_element.id + " - valueStr: " + this_element.value);
	//   const new_value = this_element.value;
	//   const element_array = this_element.id.split("_");
	//   console.log("element_array: " + element_array);
	//   //condition_cosmetic_mint_entry - valueStr: 1.17
	//   //id = "menu_cosmetic"
	//   //value = "condition_cosmetic_mint"
	//   //clearMatrixDisplay(element_array[1]);
	//   //let entry_target = value_arr[0] + "_" + value_arr[1] + "_" + value_arr[2] + "_entry";
	//   //formatMatrixField(this_element.id);
	//   updateHiddenConditionSelectionValue(this_element.id);
	//   //updateConditonDropdown(this_element.id);
	//   //let selected_condition_value = element_array[1] + "_conndition_selected_value";
	//   //cosmetic_condition_selected_value
	//   //document.getElementById(selected_condition_value).value = new_value;
	//   // let newArr = idStr.split("_");
	//   // let nameIdStr = newArr[1] + "_" + newArr[0] + "_label";
	//   // let indexFactorHolder = newArr[1] + "_" + newArr[0] + "_index";
	//   // document.getElementById(nameIdStr).value = idStr;
	//   // document.getElementById(indexFactorHolder).value = valueStr;
	//   // clearMatrixDisplay(idStr);
	//   //formatEntryFloat(idStr, Number(valueStr));
	//   //formatMatrixField(idStr);
	//   //updateDropdownDisplay(idStr);
	//   //calculateComplexPriceMatrix();
} //****

function updateHiddenConditionSelectionValue(selected_matrix_id) {
	console.log("selected_matrix_id: " + selected_matrix_id); //condition_cosmetic_nearmint_entry

	const element_array = selected_matrix_id.split("_");
	const this_element = document.getElementById(selected_matrix_id);
	const this_value = this_element.value;

	console.log("this_value: " + this_value);
	let selected_condition_value = element_array[1] + "_condition_selected_value";

	document.getElementById(selected_condition_value).value = this_value;
	updatePriceMatrix();
} //****

function updateSlider(target, input) {
	// console.log("firing update slider");

	let clean = Number(input);
	let formattedStr = clean.toLocaleString("en-US", {
		style: "decimal",
		minimumFractionDigits: 2,
		maximumFractionDigits: 2,
	});

	//let sliderTargArr = target.split("_");
	//cosmetic_condition_tuner_entry
	const entry_field_name = target.replace("slider", "entry");
	const hidden_field_name = target.replace("slider", "value");

	// console.log("hidden_field_name: " + hidden_field_name);
	// console.log("entry_field_name: " + entry_field_name);

	//let sliderTarg = sliderTargArr[0].concat("_", sliderTargArr[1], "_", sliderTargArr[2], "_slide");
	document.getElementById(entry_field_name).value = formattedStr;
	document.getElementById(hidden_field_name).value = formattedStr;
	updatePriceMatrix();
} //****

function updateSliderEntry(target, input) {
	// console.log("firing update slider entry");
	let target_name_array = target.split("_");

	const hidden_field_name = target_name_array[0] + "_" + target_name_array[1] + "_" + target_name_array[2] + "_value";
	const slider_field_name = target_name_array[0] + "_" + target_name_array[1] + "_" + target_name_array[2] + "_slider";
	//cosmetic_condition_tuner
	//cosmetic_condition_tuner_value
	//cosmetic_condition_tuner_slider

	//console.log("hidden_field_name: " + hidden_field_name);
	//console.log("slider_field_name: " + slider_field_name);

	//let slider_name = hidden_field_name + "_entry";
	let clean = Number(input);
	let formattedStr = clean.toLocaleString("en-US", {
		style: "decimal",
		minimumFractionDigits: 2,
		maximumFractionDigits: 2,
	});
	document.getElementById(hidden_field_name).value = formattedStr;
	document.getElementById(slider_field_name).value = formattedStr;
	updatePriceMatrix();
} //****

function liveUpdateItemHeaderComment(this_data) {
	title_entry = document.getElementById("medium_description_entry").value;
	this_entry = title_entry + " <span class='small'>(" + this_data + ")</span>";
	document.getElementById("item_header").innerHTML = this_entry;
} //****

function liveUpdateMediumDescription(this_key) {
	//console.log("this key = " + this_key);
	if (this_key == "Shift" || this_key == "Control" || this_key == "Alt" || this_key == "Meta") {
		//console.log(" don't do anything.");
	} else {
		// if (this_key == "+") {
		//   alert("PLUS \"+\" KEY NOT ALLOWED IN THIS FIELD. USE \"AND\" INSTEAD");
		// }
		const translation_data_obj = JSON.parse(document.getElementById("name_data_translation_array").value);
		let current_description = document.getElementById("medium_description_entry").value;
		current_description = current_description.toUpperCase();
		current_description = current_description.trim();
		//console.log("getNameDataTranslationTable, current_description: ", current_description);
		//let chars_array = current_description.split("");

		// let clean_description = "";

		// if (current_description.substr(-1) == "+") {
		//   //console.log("getNameDataTranslationTable, has + at end");
		//   let chars_array = current_description.split("");
		//   chars_array.pop();
		//   clean_description = chars_array.join("");
		//   clean_description = clean_description.trim();
		//   document.getElementById("medium_description_entry").value = clean_description;
		// } else {
		//   clean_description = current_description;
		// }
		// console.log("getNameDataTranslationTable, current_description: ", current_description);
		let start_postion = current_description.lastIndexOf(" ");
		let total_length = current_description.length;
		let search_string = current_description.slice(start_postion, total_length).trim();
		//console.log("getNameDataTranslationTable, start_postion: ", start_postion);
		//console.log("getNameDataTranslationTable, total_length: ", total_length);
		//console.log("getNameDataTranslationTable, search_string: ", search_string);
		//testArr_obj = [[["LEICA"], ["LCA"]], [["YELLOW"], ["YLW"]], [["WHITE LIGHTNING"], ["WL"]]];
		const translation_data_length = Object.keys(translation_data_obj).length;
		// const testArr_length = Object.keys(testArr_obj).length;
		let parsed_text = "";
		//console.log("search_string: " + search_string);
		try {
			const pattern = new RegExp("^(" + search_string + ").*$", "i");
			//console.log("getNameDataTranslationTable, translation_data_length: ", translation_data_length);
			for (let i = 0; i < translation_data_length; i++) {
				let test_result = pattern.test(translation_data_obj[i][0]);
				//console.log("test_result: " + test_result);
				if (test_result) {
					// console.log("found to list: " + translation_data_obj[i][0]);
					parsed_text += '<option value=" &apos;' + translation_data_obj[i][0] + '&apos;" onclick="enterUpdatedMediumDescription(&apos;' + translation_data_obj[i][0] + "&apos;&comma;&apos;" + search_string + '&apos;)">' + translation_data_obj[i][0] + "</option>";
				}
			}
		} catch (e) {
			//alert(e);
			parsed_text = "";
		}

		//let result = pattern.test(testArr_obj[i][0]);
		// console.log("regex test: " + result);

		//if (translation_data_obj[i][0].includes(search_string)) {
		//  console.log(search_string + " included in " + translation_data_obj[i][0]);
		//}
		//}

		if (parsed_text == "") {
			document.getElementById("medium_description_livesearch").classList.add("visually-hidden");
		} else {
			//let capsParsedText
			document.getElementById("medium_description_livesearch").innerHTML = parsed_text;
			document.getElementById("medium_description_livesearch").classList.remove("visually-hidden");
			document.getElementById("medium_description_livesearch").className = "text-light bg-secondary";
		}

		//  console.log(this_test_str + " included in " + attributes_obj[i][0]);
		//  parsed_text += '<option value=" &apos;' +
		//    attributes_obj[i][0] +
		//    '&apos;" onclick="enterUpdatedMediumDescription(&apos;' +
		//    attributes_obj[i][0] +
		//    '&apos;&comma;&apos;' +
		//    this_test_str
		//    + '&apos;)">' +
		//    attributes_obj[i][0] +
		//   "</option>";

		// console.log("parsedText " + i + ": " + parsed_text);

		//document.getElementById("medium_description_livesearch").innerHTML = parsedText;
		//document.getElementById("medium_description_livesearch").className = "text-light bg-secondary";
		// } else {
		//   console.log("no match");
		//document.getElementById("medium_description_livesearch").classList.add("visually-hidden");

		// document.getElementById("item_title").value = test_term;
	} // end of key check
} //****

function updateGersTitle() {
	const rawResponse = document.getElementById("name_data_translation_array").value;
	const attributes_obj = JSON.parse(rawResponse);
	let abb_title = document.getElementById("medium_description_entry").value;
	let test_term = abb_title.toUpperCase();
	const obj_length = Object.keys(attributes_obj).length;
	for (let i = 0; i < obj_length; i++) {
		let search_term = attributes_obj[i][0];
		let replace_term = attributes_obj[i][1];
		search_term = search_term.toUpperCase();
		replace_term = replace_term.toUpperCase();
		test_term = test_term.replaceAll(search_term, replace_term);
	}
	document.getElementById("item_title_entry").value = test_term;
	//console.log("test term length: " + test_term.length);
	document.getElementById("item_title-character_count").innerHTML = test_term.length;
	if (test_term.length > 30) {
		document.getElementById("item_title_entry").disabled = false;
		document.getElementById("item_title_entry").classList.add("text-light", "bg-danger");
	} else {
		document.getElementById("item_title_entry").classList.remove("text-light", "bg-danger");
		document.getElementById("item_title_entry").disabled = true;
	}
	document.getElementById("item_title").value = test_term;
} //****

function liveUpdateGersTitle() {
	test_term = document.getElementById("item_title_entry").value;
	document.getElementById("item_title_entry").value = test_term.toUpperCase();
	console.log("test term length: " + test_term.length);
	document.getElementById("item_title-character_count").innerHTML = test_term.length;
	if (test_term.length > 30) {
		document.getElementById("item_title_entry").classList.add("text-light", "bg-danger");
	} else {
		document.getElementById("item_title_entry").classList.remove("text-light", "bg-danger");
	}
	document.getElementById("item_title").value = test_term;
} //****

function toggleLutEditPricingSection(item) {
	//console.log("this item: " + item.id + " checked: " + item.checked);
	const this_array = item.id.split("_");
	const set_str = this_array[1];

	//form-control

	const children = document.getElementById(set_str + "_condition_factors_div").querySelectorAll(".form-control");

	if (!item.checked) {
		//lut_cosmetic_pricing_matrix_section
		//console.log("turn it off");
		document.getElementById("condition_" + set_str + "_dropdown_example").classList.add("visually-hidden");
		document.getElementById(set_str + "_condition_factors_div").classList.add("visually-hidden");
		document.getElementById(set_str + "_condition_tuner_value").value = "0";
		// document.getElementById("condition_" + set_str + "_mint_value").value = "0";
		for (var i = 0; i < children.length; i++) {
			let this_entry_id = children[i].id;
			let this_value_id = this_entry_id.replace("entry", "value");
			// console.log("turning off this_entry_id: " + this_entry_id);
			// console.log("turning off this_value_id: " + this_value_id);
			document.getElementById(this_value_id).value = "0";
		}
		document.getElementById("has_" + set_str + "s_value").value = "0";
		document.getElementById("lut_" + set_str + "_pricing_matrix_section_label").classList.remove("text-primary");
		document.getElementById("lut_" + set_str + "_pricing_matrix_section_label").classList.add("text-dark");
	} else {
		//console.log("turn it on");
		document.getElementById("condition_" + set_str + "_dropdown_example").classList.remove("visually-hidden");
		//console.log(document.getElementById("condition_cosmetic_mint_entry").value);
		document.getElementById(set_str + "_condition_tuner_value").value = document.getElementById("cosmetic_condition_tuner_entry").value;
		// document.getElementById("condition_" + set_str + "_mint_value").value = document.getElementById("condition_cosmetic_mint_entry").value;
		for (var i = 0; i < children.length; i++) {
			let this_entry_id = children[i].id;
			let this_value_id = this_entry_id.replace("entry", "value");
			// console.log("this_entry_id: " + this_entry_id);
			// console.log("this_value_id: " + this_value_id);
			document.getElementById(this_value_id).value = document.getElementById(this_entry_id).value;
		}
		document.getElementById("has_" + set_str + "s_value").value = "1";
		document.getElementById("lut_" + set_str + "_pricing_matrix_section_label").classList.remove("text-dark");
		document.getElementById("lut_" + set_str + "_pricing_matrix_section_label").classList.add("text-primary");
		document.getElementById(set_str + "_condition_factors_div").classList.remove("visually-hidden");
	}

	updatePriceMatrix();
} //****

function updateLongDescription(item) {
	const new_text = item.value;
	document.getElementById("long_description").value = new_text;
} //****

// ***************************************
// LUT ITEM ATTRIBUTES
// ***************************************//

function toggleAttributesSection() {
	const attributes_section = document.getElementById("all_attributes_rows");
	if (attributes_section.classList.contains("visually-hidden")) {
		//console.log("currently hidden");
		document.getElementById("all_attributes_toggle_button").value = "Hide";
		document.getElementById("all_attributes_toggle_button_icon").innerHTML = "&dtrif;";
		attributes_section.classList.remove("visually-hidden");
	} else {
		//console.log("currently showing");
		document.getElementById("all_attributes_toggle_button").value = "Show";
		document.getElementById("all_attributes_toggle_button_icon").innerHTML = "&rtrif;";
		attributes_section.classList.add("visually-hidden");
	}
}

function makeAttributesIntoObj(att_string) {
	obj = JSON.parse(att_string);
	return obj;
} //****

function updateAttributesInJSON(attribute_key, attribute_value) {
	//console.log("updateAttributesInJSON attribute_key: " + attribute_key);
	//console.log("updateAttributesInJSON attribute_value: " + attribute_value);
	let rawJSON = document.getElementById("attributes_array").value;
	jsonAttributeObject = JSON.parse(rawJSON);
	attribute_key = attribute_key.toUpperCase();

	switch (attribute_key) {
		case "TYPE":
			jsonAttributeObject.TYPE = attribute_value.toUpperCase();
			break;
		case "BRAND":
			jsonAttributeObject.BRAND = attribute_value.toUpperCase();
			break;
		case "COLOR":
			jsonAttributeObject.COLOR = attribute_value.toUpperCase();
			break;
		case "FOCUSTYPE":
			jsonAttributeObject.FOCUS_TYPE = attribute_value.toUpperCase();
			break;
		case "MOUNT":
			jsonAttributeObject.MOUNT = attribute_value.toUpperCase();
			break;
		case "FOCALLENGTH":
			jsonAttributeObject.FOCAL_LENGTH = attribute_value.toUpperCase();
			break;
		case "MAXIMUMAPERTURE":
			jsonAttributeObject.MAXIMIM_APERTURE = attribute_value.toUpperCase();
			break;
		case "FILTERSIZE":
			jsonAttributeObject.FILTER_SIZE = attribute_value.toUpperCase();
			break;
		case "BATTERY":
			jsonAttributeObject.BATTERY = JSON.parse(attribute_value);
			break;
		case "CHARGER":
			jsonAttributeObject.CHARGER = JSON.parse(attribute_value);
			break;
	}
	updatedJsonAttributeString = JSON.stringify(jsonAttributeObject);
	//console.log("updaed JSON object: " + updatedJsonAttributeString);
	document.getElementById("attributes_array").value = updatedJsonAttributeString;
} //****

function cleanHiddenAttributesField() {
	// clean attributes array
	let testAttributesObj = JSON.parse(document.getElementById("attributes_array").value);
	if (!document.getElementById("show_attribute_type").checked) {
		delete testAttributesObj.TYPE;
	}
	if (!document.getElementById("show_attribute_brand").checked) {
		delete testAttributesObj.BRAND;
	}
	if (!document.getElementById("show_attribute_color").checked) {
		delete testAttributesObj.COLOR;
	}
	if (!document.getElementById("show_attribute_focustype").checked) {
		delete testAttributesObj.FOCUS_TYPE;
	}
	if (!document.getElementById("show_attribute_mount").checked) {
		delete testAttributesObj.MOUNT;
	}
	if (!document.getElementById("show_attribute_focallength").checked) {
		delete testAttributesObj.FOCAL_LENGTH;
	}
	if (!document.getElementById("show_attribute_maximumaperture").checked) {
		delete testAttributesObj.MAXIMUM_APERTURE;
	}
	if (!document.getElementById("show_attribute_filtersize").checked) {
		delete testAttributesObj.FILTER_SIZE;
	}
	if (!document.getElementById("show_attribute_battery").checked) {
		delete testAttributesObj.BATTERY;
	}
	if (!document.getElementById("show_attribute_charger").checked) {
		delete testAttributesObj.CHARGER;
	}
	const newAttribuitesString = JSON.stringify(testAttributesObj);
	document.getElementById("attributes_array").value = newAttribuitesString;
} //****

function toggleAttributeEntry(this_element, form_entry_type) {
	//console.log("form_entry_type: " + form_entry_type);
	//console.log("state of " + this_element.id + " : " + this_element.checked);
	//show_attribute_color
	this_item_array = this_element.id.split("_");
	//console.log("this_item_array: " + this_item_array);

	if (this_element.checked) {
		if (form_entry_type == "both") {
			document.getElementById(this_item_array[1] + "_" + this_item_array[2] + "_select").classList.remove("visually-hidden");
			document.getElementById(this_item_array[1] + "_" + this_item_array[2] + "_input").classList.add("visually-hidden");
		} else {
			document.getElementById(this_item_array[1] + "_" + this_item_array[2] + "_" + form_entry_type).classList.remove("visually-hidden");
		}

		// !!!!!! udate "add" to the hidden attributes json
		const attribute_key = this_item_array[2];
		let attribute_value = "NONE";
		try {
			let attribute_input_id = "attribute_" + attribute_key + "_select";
			attribute_value = document.getElementById(attribute_input_id).value;
		} catch (err) {
			let attribute_input_id = "attribute_" + attribute_key + "_input";
			attribute_value = document.getElementById(attribute_input_id).value;
		}

		//console.log("attribute_key: " + attribute_key);
		//console.log("attribute_input_id: " + attribute_input_id);
		//console.log("attribute_value: " + attribute_value);

		updateAttributesInJSON(attribute_key, attribute_value);
	} else {
		if (form_entry_type == "both") {
			document.getElementById(this_item_array[1] + "_" + this_item_array[2] + "_select").classList.add("visually-hidden");
			document.getElementById(this_item_array[1] + "_" + this_item_array[2] + "_input").classList.add("visually-hidden");
		} else {
			document.getElementById(this_item_array[1] + "_" + this_item_array[2] + "_" + form_entry_type).classList.add("visually-hidden");
		}
		// !!!!!!  update "remove" from the hidden atttributes json
		cleanHiddenAttributesField();
	}
	//show, attribute, color
	//attribute_color_select
	//attribute_color_select
} //****

function XXXXresetTypeAttributePicker() {
	//   document.getElementById("attribute_type_select").value = "NONE";
	//   document.getElementById("attribute_type_value").value = "NONE";
	// }//****
	// function resetBrandAttributePicker() {
	//   document.getElementById("attribute_brand_input").value = "NONE";
	//   document.getElementById("attribute_brand_value").value = "NONE";
	// }//****
	// function resetColorPicker() {
	//   document.getElementById("attribute_color_select").value = "NONE";
	//   document.getElementById("attribute_color_value").value = "NONE";
} //****

function checkColorEntry(selection) {
	console.log("checking the color selection: " + selection);
	if (selection == "OTHER") {
		document.getElementById("attribute_color_select").classList.add("visually-hidden");
		document.getElementById("attribute_color_input").classList.remove("visually-hidden");
	} else {
		document.getElementById("attribute_color_select").classList.remove("visually-hidden");
		document.getElementById("attribute_color_input").classList.add("visually-hidden");
	}
} //****

function removeBattery(battery_list_id) {
	document.getElementById("attribute_battery_input_" + battery_list_id).value = "";
	document.getElementById("attribute_battery_row_" + battery_list_id).classList.add("visually-hidden");
	updateBatteryList();
} //****

function removeCharger(charger_list_id) {
	document.getElementById("attribute_charger_input_" + charger_list_id).value = "";
	document.getElementById("attribute_charger_row_" + charger_list_id).classList.add("visually-hidden");
	updateChargerList();
} //****

function addBatteryEntry() {
	const this_counter = document.getElementById("battery_rows_container").children.length;
	console.log("this is the current count: " + this_counter);
	parent_id = this_counter - 1;
	const parent_row = "attribute_battery_row_" + parent_id;
	console.log("this is the parent: " + parent_row);

	let this_row = '<div id="attribute_battery_row_' + this_counter + '" class="row">';
	this_row += '<div class="col-11">';
	this_row += '<input type="text" class="form-control border border-1 border-primary text-uppercase" id="attribute_battery_input_' + this_counter + '"';
	this_row += ' value="" placeholder="Enter Battery" name="attribute_battery_input_' + this_counter + '" onblur="updateBatteryList();"></div><div class="col-1 m-0 p-0 mt-1"><span class="text-primary cursor-pointer" href="#" onmouseup="removeBattery(' + this_counter + ')">&Otimes;</span></div>';
	this_row += "</div>";

	console.log(this_row);
	document.getElementById(parent_row).insertAdjacentHTML("afterend", this_row);
	document.getElementById("attribute_battery_input_" + this_counter).setSelectionRange(0, 0);
	document.getElementById("attribute_battery_input_" + this_counter).focus();
} //****

function addChargerEntry() {
	const this_counter = document.getElementById("charger_rows_container").children.length;
	//console.log("this is the current count: " + this_counter);
	parent_id = this_counter - 1;
	const parent_row = "attribute_charger_row_" + parent_id;
	//console.log("this is the parent: " + parent_row);

	let this_row = '<div id="attribute_charger_row_' + this_counter + '" class="row">';
	this_row += '<div class="col-11">';
	this_row += '<input type="text" class="form-control border border-1 border-primary text-uppercase" id="attribute_charger_input_' + this_counter + '"';
	this_row += ' value="" placeholder="Enter Charger" name="attribute_charger_input_' + this_counter + '" onblur="updateChargerList();"></div><div class="col-1 m-0 p-0 mt-1"><span class="text-primary cursor-pointer" href="#" onmouseup="removeCharger(' + this_counter + ')">&Otimes;</span></div>';
	this_row += "</div>";

	//console.log(this_row);
	document.getElementById(parent_row).insertAdjacentHTML("afterend", this_row);
	document.getElementById("attribute_charger_input_" + this_counter).setSelectionRange(0, 0);
	//document.getElementById("attribute_charger_input_" + this_counter).focus();
} //****

// SHOW AND HIDE FIELDS //

function toggleBatteryEntry() {
	//addBatteryBtn = document.getElementById("battery_rows_container");

	// if (addBatteryBtn.classList.contains("visually-hidden")) {
	if (show_attribute_battery.checked) {
		//console.log("show stuff");
		showBatteryEntry();
	} else {
		//console.log("hide stuff");
		hideBatteryEntry();
	}
} //****

function toggleChargerEntry() {
	//addChargerBtn = document.getElementById("add_charger_btn_div");
	if (show_attribute_charger.checked) {
		//console.log("show stuff");
		showChargerEntry();
	} else {
		// console.log("hide stuff");
		hideChargerEntry();
	}
} //****

function showBatteryEntry() {
	document.getElementById("attribute_battery_input").classList.remove("visually-hidden");
	//document.getElementById("add_battery_btn_div").classList.remove("visually-hidden");
} //****

function showChargerEntry() {
	document.getElementById("attribute_charger_input").classList.remove("visually-hidden");
	//document.getElementById("add_charger_btn_div").classList.remove("visually-hidden");
} //****

function hideBatteryEntry() {
	//attribute_battery_input
	document.getElementById("attribute_battery_input").classList.add("visually-hidden");
	//document.getElementById("add_battery_btn_div").classList.add("visually-hidden");
} //****

function hideChargerEntry() {
	document.getElementById("attribute_charger_input").classList.add("visually-hidden");
	//document.getElementById("add_charger_btn_div").classList.add("visually-hidden");
} //****

function checkLensAttributeDisplay(this_value) {
	const lensList = ["COMPACT DIGITAL CAMERA", "COMPACT FILM CAMERA", "INSTANT FILM CAMERA", "CAMCORDER", "MOVIE CAMERA", "LENS", "LENS ADAPTOR", "LENS MEDIUM AND LARGE FORMAT", "MIRRORLESS LENS", "RANGEFINDER LENS", "BELLOWS", "FINDER", "FILTER"];
	let is_lens = false;
	for (let i = 0; i < lensList.length; i++) {
		if (lensList[i] == this_value) {
			is_lens = true;
		}
	}
	if (is_lens) {
		//console.log(this_value + " has lens data.");
		document.getElementById("lens_attribute_row").classList.remove("visually-hidden");
	} else {
		//console.log(this_value + " is not a lens.");
		document.getElementById("lens_attribute_row").classList.add("visually-hidden");
	}
} //****

function updateBatteryList() {
	console.log("updateBatteryList");
	const master_counter = document.getElementById("battery_rows_container").children.length;
	let active_counter = 0;
	let batteries_array = [];
	for (let i = 0; i < master_counter; i++) {
		let input_test = document.getElementById("attribute_battery_input_" + i).value;
		if (!isEmpty(input_test)) {
			batteries_array.push(input_test.toUpperCase());
			active_counter++;
		}
	}
	let battery_arr_string = JSON.stringify(batteries_array);
	console.log("charger_arr_string: " + battery_arr_string);
	updateAttributesInJSON("BATTERY", battery_arr_string);
} //****

function updateChargerList() {
	console.log("updateChargerList");
	const master_counter = document.getElementById("charger_rows_container").children.length;
	let active_counter = 0;
	let chargers_array = [];
	for (let i = 0; i < master_counter; i++) {
		let input_test = document.getElementById("attribute_charger_input_" + i).value;
		if (!isEmpty(input_test)) {
			chargers_array.push(input_test.toUpperCase());
			active_counter++;
		}
	}
	let charger_arr_string = JSON.stringify(chargers_array);
	console.log("charger_arr_string: " + charger_arr_string);
	updateAttributesInJSON("CHARGER", charger_arr_string);
} //****

// LUT ITEM CATEGORIES //

function toggleCategoriesSection() {
	const categories_section = document.getElementById("all_categories_rows");
	if (categories_section.classList.contains("visually-hidden")) {
		//console.log("currently hidden");
		document.getElementById("all_categories_toggle_button").value = "Hide";
		document.getElementById("all_categories_toggle_button_icon").innerHTML = "&dtrif;";
		categories_section.classList.remove("visually-hidden");
	} else {
		//console.log("currently showing");
		document.getElementById("all_categories_toggle_button").value = "Show";
		document.getElementById("all_categories_toggle_button_icon").innerHTML = "&rtrif;";
		categories_section.classList.add("visually-hidden");
	}
} //****

function updateCategory() {
	// console.clear();
	// console.log("updateCategory");
	const cat_set_array = ["cat_set_a", "cat_set_b", "cat_set_c", "cat_set_da", "cat_set_db", "cat_set_fa", "cat_set_fb", "cat_set_fc", "cat_set_fd", "cat_set_g"];
	let categories_string = "";

	let first_set = document.getElementById("cat_set_a");
	let first_index = first_set.options.selectedIndex;
	let first_text = first_set[first_index].innerHTML;
	// console.log("first selection index: " + first_index);
	// console.log("first selection text: " + first_text);

	if (first_index) {
		categories_string = first_set[first_index].innerHTML;
	}

	for (let i = 1; i < cat_set_array.length; i++) {
		let temp_selection = document.getElementById(cat_set_array[i]).options;
		let temp_selection_index = temp_selection.selectedIndex;
		let temp_options_text = temp_selection[temp_selection_index].innerHTML;

		if (temp_selection_index) {
			categories_string += " > ";
			categories_string += temp_options_text;
			// console.log(cat_set_array[i] + " selection index: " + temp_selection_index);
			// console.log(cat_set_array[i] + " selection text: " + temp_options_text);
		}
	}

	document.getElementById("categories").value = categories_string;
	document.getElementById("category_display").value = categories_string;
} //****

function toggleManualCategoryEntry() {
	const this_switch = document.getElementById("manual_category_entry_switch").checked;
	if (this_switch) {
		document.getElementById("category_display").disabled = false;
		document.getElementById("category_display").classList.remove("bg-light-grey-2");
		//console.log("I'M ON");
	} else {
		//console.log("I'M OFF");
		document.getElementById("category_display").disabled = true;
		document.getElementById("category_display").classList.add("bg-light-grey-2");
	}
} //****

function updateManualCategoryEntry(this_string) {
	document.getElementById("categories").value = this_string;
} //****

// LUT UPDATE CONFIRM BUTTON //
function confirmLUTUpdate() {
	//console.log("Check all the data first");

	document.getElementById("update_lut_item").submit();
} //****

// ***************************************
// VENUE AND DATE SESSION FUNCTIONS
// ***************************************//

function setVenueSwitch() {
	document.getElementById("venue_switch").value = "1";
	if (document.getElementById("session_venue_id").value == "01") {
		document.getElementById("venue_switch").value = "0";
	}
} //****

function setDateSwitch() {
	const test_date = document.getElementById("session_date").value;
	//const date_test_date = new Date(test_date);
	console.log("test_date var :" + test_date);
	console.log("test_date type :" + typeof test_date);

	if (isToday(test_date)) {
		document.getElementById("date_switch").value = "0";
	} else {
		document.getElementById("date_switch").value = "1";
	}
} //****

function isToday(testing_date) {
	const today = new Date();
	const test_date = new Date(testing_date + "T00:00:00");
	console.log("today var :" + today);
	console.log("today type :" + typeof today);
	console.log("test_date var :" + test_date);
	console.log("test_date type :" + typeof test_date);

	return test_date.getDate() == today.getDate() && test_date.getMonth() == today.getMonth() && test_date.getFullYear() == today.getFullYear();
}

function goBackToHome() {
	pageLoad(getURLRoot());
}

function setUserSessionVenueId(venue_id) {
	console.log("venue id :" + venue_id);
	document.getElementById("user_session_venue_id").value = venue_id;
}

// ***************************************
// SECURITY FUNCTIONS
// ***************************************//

function setAlertButton(target_page, this_message = "Are you sure?", this_yes_btn_name = "Yes", this_no_btn_name = "No", alert_color = "bg-danger", alert_heading = "Alert") {
	let full_url = "";
	if (target_page != "") {
		console.log("target_page: " + target_page);
		let root_url = getURLRoot();
		console.log("root_url: " + root_url);
		full_url = root_url + target_page;
		console.log("full_url: " + full_url);
	}

	alertWindow(full_url, this_message, this_yes_btn_name, this_no_btn_name, alert_color, alert_heading);
} //****

function fireAlertButton(this_url) {
	if (this_url != "") {
		pageLoad(this_url);
	}
} //****

function alertWindow(this_url, this_message, yes_btn_name, no_btn_name, alert_color, alert_heading) {
	const modal = document.getElementById("myModal");
	//const btn = document.getElementById("myBtn");
	//const span = document.getElementsByClassName("close")[0];
	const yes_btn = document.getElementById("modal-yes-button");
	const no_btn = document.getElementById("modal-no-button");

	yes_btn.value = yes_btn_name;
	no_btn.value = no_btn_name;

	document.getElementById("banner_header_copy").innerHTML = alert_heading;
	document.getElementById("banner_header_bg").classList = "modal-header " + alert_color;
	document.getElementById("modal-message").innerHTML = this_message;

	modal.style.opacity = 0;
	modal.style.display = "block";

	yes_btn.onclick = function () {
		modal.style.display = "none";
		fireAlertButton(this_url);
	};

	if (no_btn_name == "") {
		no_btn.style.display = "none";
	}
	no_btn.onclick = function () {
		modal.style.display = "none";
	};

	modal.onclick = function () {
		modal.style.display = "none";
	};

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function (event) {
		if (event.target == modal) {
			modal.style.display = "none";
		}
	};

	// setTimeout(function () {
	// 	modal.style.opacity = 1;
	// 	yes_btn.focus();
	// }, 500);

	let this_opacity = 0;

	let interval = setInterval(function () {
		if (this_opacity < 1.0) {
			this_opacity += 0.125;
			console.log("this_opacity: " + this_opacity);
			modal.style.opacity = this_opacity;
		} else {
			clearInterval(interval);
			modal.style.opacity = 1;
			yes_btn.focus();
		}
	}, 45);
} //****

function checkAppSecurity(this_domain) {
	const this_pass_attempt = document.getElementById("secure_app_pasword").value;

	console.log("secure_app_passsword: " + secure_app_passsword);
	console.log("this_pass_attempt: " + this_pass_attempt);
	//console.log("URLRoot: " + getURLRoot());

	 if (this_pass_attempt == secure_app_passsword) {
	 	console.log("password correct");

	 	document.getElementById("session_secure").value = "1";

	// 	// 	console.log(getURLRoot() + "/pages/secure_session");
	// 	console.log("start this app: " + this_domain);

	// 	if (this_domain == "trade") {
	 		document.getElementById("target_page").value = "trades/start";
	// 		//	pageLoad(getURLRoot() + "/trades/start");
	// 	} else if (this_domain == "lab") {
	// 		document.getElementById("target_page").value = "labs/start";
	// 		notYetAlert();
	// 	} else {
	// 		setAlertButton("", "No Such Page", "Close", "", "bg-danger", "Error");
	// 	}
	document.getElementById("app_login_form").submit();
	 } else {
	 	setAlertButton("", "Incorrect Password", "Try Again", "", "bg-warning", "Alert");
	 }
} //****

function notYetAlert() {
	setAlertButton("", "Feature Not Yet Implemented", "Okay", "", "bg-primary", "Not Yet");
} //****

function showFlashMessage(message_data, style = "alert-success", pause = 2500) {
	const flash_alert_item = document.getElementById("msg-flash");
	flash_alert_item.style.opacity = 0;
	flash_alert_item.classList.add("visually-hidden");
	flash_alert_item.innerHTML = "";
	// start adding new data
	let opacity = 0.85; // Initial opacity
	let timeout;
	flash_alert_item.innerHTML = message_data;
	flash_alert_item.classList.add(style);
	console.log("flash message: " + flash_alert_item.innerHTML);
	flash_alert_item.classList.remove("visually-hidden");
	flash_alert_item.style.opacity = opacity;

	function fadeOut() {
		let interval = setInterval(function () {
			if (opacity > 0) {
				opacity -= 0.025;
				flash_alert_item.style.opacity = opacity;
			} else {
				clearInterval(interval);
				flash_alert_item.style.opacity = 0;
				flash_alert_item.classList.add("visually-hidden");
				flash_alert_item.innerHTML = "";
				clearTimeout(timeout);
			}
		}, 75);
	}
	function holdFlashMessage(pause_time) {
		timeout = setTimeout(fadeOut, pause_time);
	}
	holdFlashMessage(pause);
} //****

function addFieldHighlight(this_element) {
	this_element.classList.add("field-alert");
}

function removeFieldHighlight(this_element) {
	this_element.classList.remove("field-alert");
}

function addToFlashMessage(list, message, list_item, error_message_entry) {
	list.push(list_item);
	message += error_message_entry;
	return [list, message];
}

function removeFromFlashMessage(list, message, list_item, error_message_entry) {
	let position = list.indexOf(list_item);
	list.splice(position, 1);
	let new_message = message.replace(error_message_entry, "");
	message = new_message;
	return [list, message];
}

// ***************************************
// HELPER FUNCTIONS
// ***************************************//

function numRound(num) {
	return Math.round(num);
} //****

function priceToFive(num) {
	return Math.round(num / 5) * 5 - 0.01;
} //****

function priceToZero(num) {
	return Math.round(num / 10) * 10;
}

function priceToCurrent(num) {
	new_num = Math.round(num) - 0.01;
	// console.log("+_#-+_#-+_#-+_#-+_#-+_#-");
	// console.log("+_#-+_#-+_#-+_#-+_#-+_#-");
	// console.log("new_num var :" + new_num);
	// console.log("new_num type :" + typeof new_num);
	// console.log("+_#-+_#-+_#-+_#-+_#-+_#-");
	// console.log("+_#-+_#-+_#-+_#-+_#-+_#-");
	return new_num;
} //****

function caseNameString(str) {
	//let ucStr = str.substr(0,1).toUpperCase();
	//let lcStr = str.substr(1,str.length).toLowerCase();
	//let casedStr = ucStr + lcStr;
	return str.substr(0, 1).toUpperCase() + str.substr(1, str.length).toLowerCase();
	//let casedStr =
	//return casedStr;
} //****

function formatPhoneNumber(str) {
	//Filter only numbers from the input
	let cleaned = ("" + str).replace(/\D/g, "");
	if (str.length == 10) {
		//Check if the input is 10 digits (standard number)
		var match = cleaned.match(/^(\d{3})(\d{3})(\d{4})$/);
		if (match) {
			var newPhoneStr = "(" + match[1] + ") " + match[2] + "-" + match[3];
		} else {
			var newPhoneStr = str;
		}
	} else if (str.length == 11) {
		//Check if the input is 11 digits (number with 1 in front)
		let match = cleaned.match(/(^[1])(\d{3})(\d{3})(\d{4})$/);
		if (match) {
			let newPhoneStr = match[1] + " (" + match[2] + ") " + match[3] + "-" + match[4];
		} else {
			var newPhoneStr = str;
		}
	} else {
		// or if something else, just pass the raw string
		newPhoneStr = str;
	}
	return newPhoneStr;
} //****

function formatCurrencyClean(str) {
	let clean = Number(str.replace(/,/g, ""));
	let formattedStr = clean.toLocaleString("en-US", { style: "decimal" });
	return formattedStr;
} //****

function formatCurrency(num) {
	return num.toLocaleString("en-US", { style: "currency", currency: "USD" });
} //****

function formatStringtoCurrency(this_element) {
	const this_id = this_element.id;
	let this_str = this_element.value;
	this_str = this_str.replace("$", "");
	//console.log("this_str: " + this_str);
	const this_num = Number(this_str);
	const this_curr = formatCurrency(this_num);
	// console.log("this_id: " + this_id);
	// console.log("this_str: " + this_str);
	// console.log("this_num: " + this_num);
	// console.log("this_curr: " + this_curr);
	this_element.value = this_curr;
} //****

function makeValueUpperCase(this_element) {
	//console.log("makeValueUpperCase - this_element value: " + this_element.value);
	const start_entry = this_element.value;
	const new_entry = start_entry.toUpperCase();
	document.getElementById(this_element.id).value = new_entry;
} //****

// function logVariable(label, varname) {
// 	console.log(`${label}: ${varname}`);
// } //****

function updateFormFieldValue(field_id, insertData) {
	if (field_id === undefined) {
		console.log("ERROR: updateFormFieldValue error, the field id is undefined");
		return;
	}
	if (insertData === undefined) {
		console.log("ERROR: updateFormFieldValue error, the inesert data is undefined");
		return;
	}
	document.getElementById(field_id).value = insertData;
	document.getElementById(field_id).focus();
	document.getElementById(field_id).blur();
} //****

function getFormFieldValue(field_id) {
	const this_value = document.getElementById(field_id).value;
	return this_value;
} //****

function pageClose() {
	window.close();
} //****

function selectText(this_item) {
	document.getElementById(this_item).select();
} //****

function getURLRoot() {
	console.log("-----------");
	console.log("getting url root");
	let this_url = window.location.href;
	console.log("URL: " + this_url);
	const url_array = this_url.split("/");
	console.log("url_array: " + url_array);
	url_root = url_array[0] + "//" + url_array[2] + "/" + url_array[3];
	console.log("url_root: " + url_root);
	return url_root;
} //****

function pageLoad(this_url) {
	window.open(this_url, "_self");
} //****

function toggle_visible(this_id) {
	const this_element = document.getElementById(this_id);
	const th = this_element.classList;

	console.log("this_element.classList: " + this_element.classList);
	if (this_element.classList.contains("visually-hidden")) {
		this_element.classList.remove("visually-hidden");
	} else {
		this_element.classList.add("visually-hidden");
	}
} //****

function isEmpty(this_var) {
	if (this_var == "") {
		return true;
	}
	if (this_var == undefined) {
		return true;
	}
	if (this_var == null) {
		return true;
	}
	return false;
} //****

// function copyToClipboard(str) {
// 	alert("made it to the function");

// 	console.log("raw string: " + str);
// 	function listener(e) {
// 		e.clipboardData.setData("text/html", str);
// 		e.clipboardData.setData("text/plain", str);
// 		e.preventDefault();
// 	}
// 	document.addEventListener("copy", listener);
// 	document.execCommand("copy");
// 	document.removeEventListener("copy", listener);
// }
