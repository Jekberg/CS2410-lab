const express = require("express");
const status = require("http-status");

const version = "/v1";
const path = "/api/message";
module.export = function(message)
{
	const router = express.Router();
	router.put(version + path, function (req, res)
	{
		message.create(res.body, function (err, docs)
		{
			return res.send(status.CREATED).send(docs);
		});
	});
	router.get(version + path, function (req, res)
	{
		message.readAll(function (err, docs)
		{
			res.send(docs);
		});
	});
	router.get(version + path + ":id", function (req, res)
	{
		message.read(req.params.id, function (err, docs)
		{
			res.send(docs);
		});
	});
	router.put(version + path + ":id", function (req, res)
	{
		message.update(req.params.id, req.body, function (err, docs)
		{
			res.status(status.ACCEPTED).send(docs);
		});
	});
	router.delete(version + path + ":id", function (req, res)
	{
		message.delete(req.params.id, function (err, docs)
		{
			res.sendStatus(status.ACCEPTED);
		});
	});
	return router;
};
