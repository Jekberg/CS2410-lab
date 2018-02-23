const chai = require("chai");
const expect = chai.expect;
const request = require("superagent");
const status = require("http-status");
const express = require("express");
const route = require("../routes/hello");
const api_root = "http://localhost:3000/";
const port = 3000;
const app = express();

describe("hello API", function()
{
	var server;
	before(function (done)
	{
		app.use("/", route);
		server = app.listen(port, function()
		{
			done();
		});
	});
	after(function (done)
	{
		server.close();
		done();
	});
	it("GET request returns Hello, World!", function (done)
	{
		request.get(api_root)
		.end(function (err, res)
		{
			expect(err).to.not.be.an("error");
			expect(res.statusCode).to.equal(status.OK);
			expect(res.text).to.equal("Hello, World!");
			done();
		});
	});
	it("POST request is not allowed", function (done)
	{
		request.post(api_root)
		.end(function (err, res)
		{
			expect(err).to.be.an('error');
        		expect(res.statusCode).to.equal(
				status.METHOD_NOT_ALLOWED);
			done();
		});
	});
});


