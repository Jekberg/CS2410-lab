const sanitizeHTML = require('sanitize-html');



module.exports = function(url, callback)
{
	const mongoose = require('mongoose');
	mongoose.connect(url,callback);
	const messageSchema = new mongoose.Schema(
		{
			username: {
				type: String,
				required: true
			},
			text: {
				type: String,
				required: true
			}
		},
		{
			strict: "throw",
		});
	const Message = mongoose.model(
		'messages',
		messageSchema
	);

	return {
		create:function(newMessage, callback)
		{
			try
			{
				const message = new Message(newMessage);
				if(message.username)
					message.username= sanitizeHTML(message.username);
				if(message.text)
					message.text= sanitizeHTML(message.text);
				if(typeof message.username !== "string")
					return callback("username must be a string");
				message.save(callback);
			}
			catch(e)
			{
				callback(e);
			}
	    	},
		read:function(id, callback)
		{
			Message.findById(id, callback);
	    	},
	    	readUsername:function(username, callback)
		{
			if(typeof username === "string")
				Message.find(
					{
						username: username
					},
					callback);
			else
				callback("username must be a string");
	    	},
	    	readAll:function(callback)
		{
			Message.find({}, callback);
	    	},
	    	update:function(id,updatedMessage, callback)
		{
			Message.findByIdAndUpdate(id, updatedMessage, "select", callback);
	    	},
	    	delete:function(id,callback)
		{
			Message.findByIdAndRemove(id, callback);
	    	},
	    	deleteAll:function(callback)
		{
	      		Message.remove({},callback);
	    	},
	    	disconnect:function()
		{
	      		mongoose.disconnect();
	    	}
	};
};
