define ( require, module, exports ) ->
    # Really simple view interface, which simply appends each provided segment
    # to a <pre> element it creates in the given container.
    class BsoadView
        constructor: ( @container ) ->
            @header  = jQuery "#hosts"
            @content = jQuery "#content"
            @hosts   = ["client"]
            @modalId = 1

        # Handle the segment by simply appending it to the <pre> tags content
        handleSegment: ( segment ) ->
            interaction = JSON.parse segment.data.replace( /^\x00*/, "" )
            request     = interaction.request
            response    = interaction.response

            host = request.headers.Host
            if ( @hosts.indexOf( host ) == -1 )
                @hosts.push( host )
                jQuery( @header ).append( foo = '<th id="' + host + '">' + host + "</th>" )
                jQuery( @header ).find( "th" ).css( "width", ( 100 / @hosts.length ).toFixed( 2 ) + "%" )

            requestHtml  = @requestHtml( request )
            responseHtml = ( ( if current == host then @responseHtml( response ) else "<td></td>" ) for current in @hosts when current isnt "client" ).join( "" )

            @content.prepend( row = jQuery( "<tr>" + requestHtml + responseHtml + "</tr>" ) )
            jQuery( row ).find( "button.show" ).on( "click", ( ( e ) ->
                jQuery( row ).find( ".info" ).toggle()
            ) );

        requestHtml: ( request ) ->
            html  = '<td class="request">'

            @modalId++
            html += '<div class="btn-group">' +
                        '<button onClick="jQuery( \'#command_' + @modalId + '\' ).show(); return false" class="btn btn-mini btn-inverse">' +
                            '<i class="icon-file icon-white"></i>' + 
                        '</button>' +
                        '<button class="btn btn-mini btn-inverse show"><i class="icon-plus icon-white"></i></button>' +
                    '</div>'

            html += '<div class="request">' +
                        '<span class="method">' + request.method + '</span> ' +
                        '<span class="path">' + request.path + '</span> ' +
                        '<span class="version">' + request.version + '</span> ' +
                    '</div>'

            html += @headersHtml( request.headers )
            html += @bodyHtml( request.body )

            html += '<div class="modal" id="command_' + @modalId + '">' +
                        '<div class="modal-header">' +
                            '<button class="close" onClick="jQuery( \'#command_' + @modalId + '\' ).hide(); return false">×</button>' +
                            '<h3>Curl command to reproduce request</h3>' +
                        '</div>' +
                        '<div class="modal-body"><pre>' + @escapeHtml( request.curlCommand ) + '</pre></div>' +
                    '</div>'
            return html + '</td>'

        responseHtml: ( response ) ->

            if ( response.code >= 500 )
                type = "alert alert-error"
            else if ( response.code >= 400 )
                type = "alert"
            else if ( response.code >= 300 )
                type = "alert alert-info"
            else
                type = "alert alert-success"

            html  = '<td class="response">'
            html += '<div class="response ' + type + '">' +
                    '<span class="version">' + response.version + '</span> ' +
                    '<span class="code">' + response.code + '</span> ' +
                    '<span class="message">' + response.message + '</span> ' +
                '</div>'
            html += @headersHtml( response.headers )
            html += @bodyHtml( response.body )
            return html + '</td>'

        headersHtml: ( headers ) ->
            html  = '<ul class="headers info">'
            html += '<li><span class="name">' + name + '</span>: <span class="value">' + value + '</span></li>' for name, value of headers
            return html + '</ul>'

        bodyHtml: ( body ) ->
            return if body then '<div class="body info"><pre>' + @escapeHtml( body ) + '</pre></div>' else ""

        escapeHtml: ( string ) ->
            string = String( string )
            return string.replace( "&", "&amp;", "g" ).replace( "<", "&lt;", "g" ).replace( ">", "&gt;", "g" ).replace( '"', "&quot;", "g" )

    module.exports = BsoadView
