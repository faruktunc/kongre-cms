> ## Documentation Index
> Fetch the complete documentation index at: https://filamentphp.com/docs/llms.txt
> Use this file to discover all available pages before exploring further.

# Overview

export const UtilityInjection = ({extras, except, set, version, children}) => {
  const parsedExtras = (extras ?? '').split('||').filter(extra => extra !== '').map(extra => {
    const [name, type, parameter, description] = extra.split(';;');
    return {
      name,
      type,
      parameter,
      description
    };
  });
  const utilitySets = {
    '5.x': {
      actions: [{
        name: 'Action',
        type: 'Filament\\Actions\\Action',
        parameter: '$action',
        description: 'The current action instance.'
      }, {
        name: 'Arguments',
        type: 'array<string, mixed>',
        parameter: '$arguments',
        description: 'The array of arguments passed to the action when it was triggered.'
      }, {
        name: 'Data',
        type: 'array<string, mixed>',
        parameter: '$data',
        description: "The array of data submitted from form fields in the action's modal. It will be empty before the modal form is submitted."
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'Eloquent model FQN',
        type: '?string<Illuminate\\Database\\Eloquent\\Model>',
        parameter: '$model',
        description: 'The Eloquent model FQN for the current action, if one is attached.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record for the current action, if one is attached.'
      }, {
        name: 'Selected Eloquent records',
        type: 'Illuminate\\Support\\Collection',
        parameter: '$selectedRecords',
        description: '[Bulk actions only] The Eloquent records selected in the table.'
      }, {
        name: 'Mounted actions',
        type: 'array<Filament\\Actions\\Action>',
        parameter: '$mountedActions',
        description: 'The array of actions that are currently mounted in the Livewire component. This is useful for accessing data from parent actions.'
      }, {
        name: 'Schema',
        type: 'Filament\\Schemas\\Schema',
        parameter: '$schema',
        description: '[Actions in schemas only] The schema object that this action belongs to.'
      }, {
        name: 'Schema component',
        type: 'Filament\\Schemas\\Components\\Component',
        parameter: '$schemaComponent',
        description: '[Actions in schemas only] The schema component that this action belongs to.'
      }, {
        name: 'Schema get function',
        type: 'Filament\\Schemas\\Components\\Utilities\\Get',
        parameter: '$schemaGet',
        description: '[Actions in schemas only] A function for retrieving values from the schema data. Validation is not run on form fields.'
      }, {
        name: 'Schema set function',
        type: 'Filament\\Schemas\\Components\\Utilities\\Set',
        parameter: '$schemaSet',
        description: '[Actions in schemas only] A function for setting values in the schema data.'
      }, {
        name: 'Schema component state',
        type: 'mixed',
        parameter: '$schemaComponentState',
        description: '[Actions in schemas only] The current value of the schema component.'
      }, {
        name: 'Schema operation',
        type: 'string',
        parameter: '$schemaOperation',
        description: '[Actions in schemas only] The current operation being performed by the schema. Usually <code>create</code>, <code>edit</code>, or <code>view</code>.'
      }, {
        name: 'Schema state',
        type: 'mixed',
        parameter: '$schemaState',
        description: '[Actions in schemas only] The current value of the schema that this action belongs to, like the current repeater item.'
      }, {
        name: 'Table',
        type: 'Filament\\Tables\\Table',
        parameter: '$table',
        description: '[Actions in tables only] The table object that this action belongs to.'
      }],
      actionGroups: [{
        name: 'Action group',
        type: 'Filament\\Actions\\ActionGroup',
        parameter: '$group',
        description: 'The current action group instance.'
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'Eloquent model FQN',
        type: '?string<Illuminate\\Database\\Eloquent\\Model>',
        parameter: '$model',
        description: 'The Eloquent model FQN for the current action group, if one is attached.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record for the current action group, if one is attached.'
      }, {
        name: 'Mounted actions',
        type: 'array<Filament\\Actions\\Action>',
        parameter: '$mountedActions',
        description: 'The array of actions that are currently mounted in the Livewire component. This is useful for accessing data from parent actions.'
      }, {
        name: 'Schema',
        type: 'Filament\\Schemas\\Schema',
        parameter: '$schema',
        description: '[Action groups in schemas only] The schema object that this action group belongs to.'
      }, {
        name: 'Schema component',
        type: 'Filament\\Schemas\\Components\\Component',
        parameter: '$schemaComponent',
        description: '[Action groups in schemas only] The schema component that this action group belongs to.'
      }, {
        name: 'Schema get function',
        type: 'Filament\\Schemas\\Components\\Utilities\\Get',
        parameter: '$schemaGet',
        description: '[Action groups in schemas only] A function for retrieving values from the schema data. Validation is not run on form fields.'
      }, {
        name: 'Schema component state',
        type: 'mixed',
        parameter: '$schemaComponentState',
        description: '[Action groups in schemas only] The current value of the schema component.'
      }, {
        name: 'Schema operation',
        type: 'string',
        parameter: '$schemaOperation',
        description: '[Action groups in schemas only] The current operation being performed by the schema. Usually <code>create</code>, <code>edit</code>, or <code>view</code>.'
      }, {
        name: 'Schema state',
        type: 'mixed',
        parameter: '$schemaState',
        description: '[Action groups in schemas only] The current value of the schema that this action group belongs to, like the current repeater item.'
      }, {
        name: 'Table',
        type: 'Filament\\Tables\\Table',
        parameter: '$table',
        description: '[Action groups in tables only] The table object that this action group belongs to.'
      }],
      formFields: [{
        name: 'Field',
        type: 'Filament\\Forms\\Components\\Field',
        parameter: '$component',
        description: 'The current field component instance.'
      }, {
        name: 'Get function',
        type: 'Filament\\Schemas\\Components\\Utilities\\Get',
        parameter: '$get',
        description: 'A function for retrieving values from the current form data. Validation is not run.'
      }, {
        name: 'Eloquent model FQN',
        type: '?string<Illuminate\\Database\\Eloquent\\Model>',
        parameter: '$model',
        description: 'The Eloquent model FQN for the current schema.'
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'Raw state',
        type: 'mixed',
        parameter: '$rawState',
        description: 'The current value of the field, before state casts were applied. Validation is not run.'
      }, {
        name: 'State',
        type: 'mixed',
        parameter: '$state',
        description: 'The current value of the field. Validation is not run.'
      }, {
        name: 'Operation',
        type: 'string',
        parameter: '$operation',
        description: 'The current operation being performed by the schema. Usually <code>create</code>, <code>edit</code>, or <code>view</code>.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record for the current schema.'
      }],
      exportColumns: [{
        name: 'Export column',
        type: 'Filament\\Actions\\Exports\\ExportColumn',
        parameter: '$column',
        description: 'The current export column instance.'
      }, {
        name: 'Exporter',
        type: '?Filament\\Actions\\Exports\\Exporter',
        parameter: '$exporter',
        description: 'The instance of the exporter class that is currently being used for exporting data.'
      }, {
        name: 'Options',
        type: 'array<string, mixed>',
        parameter: '$options',
        description: 'The options that were defined when the export started.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record that is currently being exported.'
      }],
      importColumns: [{
        name: 'Import column',
        type: 'Filament\\Actions\\Imports\\ImportColumn',
        parameter: '$column',
        description: 'The current import column instance.'
      }, {
        name: 'Data',
        type: 'array<string, mixed>',
        parameter: '$data',
        description: 'The processed data for the record that is currently being imported.'
      }, {
        name: 'Importer',
        type: '?Filament\\Actions\\Imports\\Importer',
        parameter: '$importer',
        description: 'The instance of the importer class that is currently being used for importing data.'
      }, {
        name: 'Options',
        type: 'array<string, mixed>',
        parameter: '$options',
        description: 'The options that were defined when the import started.'
      }, {
        name: 'Original data',
        type: 'array<string, mixed>',
        parameter: '$originalData',
        description: 'The original data for the record that is currently being imported, before it was processed.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record that is currently being imported.'
      }],
      infolistEntries: [{
        name: 'Entry',
        type: 'Filament\\Infolists\\Components\\Entry',
        parameter: '$component',
        description: 'The current entry component instance.'
      }, {
        name: 'Get function',
        type: 'Filament\\Schemas\\Components\\Utilities\\Get',
        parameter: '$get',
        description: 'A function for retrieving values from the current schema data. Validation is not run on form fields.'
      }, {
        name: 'Eloquent model FQN',
        type: '?string<Illuminate\\Database\\Eloquent\\Model>',
        parameter: '$model',
        description: 'The Eloquent model FQN for the current schema.'
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'State',
        type: 'mixed',
        parameter: '$state',
        description: 'The current value of the entry.'
      }, {
        name: 'Operation',
        type: 'string',
        parameter: '$operation',
        description: 'The current operation being performed by the schema. Usually <code>create</code>, <code>edit</code>, or <code>view</code>.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record for the current schema.'
      }],
      schemaComponents: [{
        name: 'Component',
        type: 'Filament\\Schemas\\Components\\Component',
        parameter: '$component',
        description: 'The current component instance.'
      }, {
        name: 'Get function',
        type: 'Filament\\Schemas\\Components\\Utilities\\Get',
        parameter: '$get',
        description: 'A function for retrieving values from the current schema data. Validation is not run on form fields.'
      }, {
        name: 'Eloquent model FQN',
        type: '?string<Illuminate\\Database\\Eloquent\\Model>',
        parameter: '$model',
        description: 'The Eloquent model FQN for the current schema.'
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'Operation',
        type: 'string',
        parameter: '$operation',
        description: 'The current operation being performed by the schema. Usually <code>create</code>, <code>edit</code>, or <code>view</code>.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record for the current schema.'
      }],
      tableColumns: [{
        name: 'Column',
        type: 'Filament\\Tables\\Columns\\Column',
        parameter: '$column',
        description: 'The current column instance.'
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'Row loop',
        type: 'stdClass',
        parameter: '$rowLoop',
        description: 'The <a href="https://laravel.com/docs/blade#the-loop-variable" target="_blank">row loop</a> object for the current table row.'
      }, {
        name: 'State',
        type: 'mixed',
        parameter: '$state',
        description: 'The current value of the column, based on the current table row.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record for the current table row.'
      }, {
        name: 'Table',
        type: 'Filament\\Tables\\Table',
        parameter: '$table',
        description: 'The current table instance.'
      }],
      tableFilters: [{
        name: 'Filter',
        type: 'Filament\\Tables\\Filters\\BaseFilter',
        parameter: '$filter',
        description: 'The current filter instance.'
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'Table',
        type: 'Filament\\Tables\\Table',
        parameter: '$table',
        description: 'The current table instance.'
      }]
    },
    '4.x': {
      actions: [{
        name: 'Action',
        type: 'Filament\\Actions\\Action',
        parameter: '$action',
        description: 'The current action instance.'
      }, {
        name: 'Arguments',
        type: 'array<string, mixed>',
        parameter: '$arguments',
        description: 'The array of arguments passed to the action when it was triggered.'
      }, {
        name: 'Data',
        type: 'array<string, mixed>',
        parameter: '$data',
        description: "The array of data submitted from form fields in the action's modal. It will be empty before the modal form is submitted."
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'Eloquent model FQN',
        type: '?string<Illuminate\\Database\\Eloquent\\Model>',
        parameter: '$model',
        description: 'The Eloquent model FQN for the current action, if one is attached.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record for the current action, if one is attached.'
      }, {
        name: 'Selected Eloquent records',
        type: 'Illuminate\\Support\\Collection',
        parameter: '$selectedRecords',
        description: '[Bulk actions only] The Eloquent records selected in the table.'
      }, {
        name: 'Mounted actions',
        type: 'array<Filament\\Actions\\Action>',
        parameter: '$mountedActions',
        description: 'The array of actions that are currently mounted in the Livewire component. This is useful for accessing data from parent actions.'
      }, {
        name: 'Schema',
        type: 'Filament\\Schemas\\Schema',
        parameter: '$schema',
        description: '[Actions in schemas only] The schema object that this action belongs to.'
      }, {
        name: 'Schema component',
        type: 'Filament\\Schemas\\Components\\Component',
        parameter: '$schemaComponent',
        description: '[Actions in schemas only] The schema component that this action belongs to.'
      }, {
        name: 'Schema get function',
        type: 'Filament\\Schemas\\Components\\Utilities\\Get',
        parameter: '$schemaGet',
        description: '[Actions in schemas only] A function for retrieving values from the schema data. Validation is not run on form fields.'
      }, {
        name: 'Schema set function',
        type: 'Filament\\Schemas\\Components\\Utilities\\Set',
        parameter: '$schemaSet',
        description: '[Actions in schemas only] A function for setting values in the schema data.'
      }, {
        name: 'Schema component state',
        type: 'mixed',
        parameter: '$schemaComponentState',
        description: '[Actions in schemas only] The current value of the schema component.'
      }, {
        name: 'Schema operation',
        type: 'string',
        parameter: '$schemaOperation',
        description: '[Actions in schemas only] The current operation being performed by the schema. Usually <code>create</code>, <code>edit</code>, or <code>view</code>.'
      }, {
        name: 'Schema state',
        type: 'mixed',
        parameter: '$schemaState',
        description: '[Actions in schemas only] The current value of the schema that this action belongs to, like the current repeater item.'
      }, {
        name: 'Table',
        type: 'Filament\\Tables\\Table',
        parameter: '$table',
        description: '[Actions in tables only] The table object that this action belongs to.'
      }],
      actionGroups: [{
        name: 'Action group',
        type: 'Filament\\Actions\\ActionGroup',
        parameter: '$group',
        description: 'The current action group instance.'
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'Eloquent model FQN',
        type: '?string<Illuminate\\Database\\Eloquent\\Model>',
        parameter: '$model',
        description: 'The Eloquent model FQN for the current action group, if one is attached.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record for the current action group, if one is attached.'
      }, {
        name: 'Mounted actions',
        type: 'array<Filament\\Actions\\Action>',
        parameter: '$mountedActions',
        description: 'The array of actions that are currently mounted in the Livewire component. This is useful for accessing data from parent actions.'
      }, {
        name: 'Schema',
        type: 'Filament\\Schemas\\Schema',
        parameter: '$schema',
        description: '[Action groups in schemas only] The schema object that this action group belongs to.'
      }, {
        name: 'Schema component',
        type: 'Filament\\Schemas\\Components\\Component',
        parameter: '$schemaComponent',
        description: '[Action groups in schemas only] The schema component that this action group belongs to.'
      }, {
        name: 'Schema get function',
        type: 'Filament\\Schemas\\Components\\Utilities\\Get',
        parameter: '$schemaGet',
        description: '[Action groups in schemas only] A function for retrieving values from the schema data. Validation is not run on form fields.'
      }, {
        name: 'Schema component state',
        type: 'mixed',
        parameter: '$schemaComponentState',
        description: '[Action groups in schemas only] The current value of the schema component.'
      }, {
        name: 'Schema operation',
        type: 'string',
        parameter: '$schemaOperation',
        description: '[Action groups in schemas only] The current operation being performed by the schema. Usually <code>create</code>, <code>edit</code>, or <code>view</code>.'
      }, {
        name: 'Schema state',
        type: 'mixed',
        parameter: '$schemaState',
        description: '[Action groups in schemas only] The current value of the schema that this action belongs to, like the current repeater item.'
      }, {
        name: 'Table',
        type: 'Filament\\Tables\\Table',
        parameter: '$table',
        description: '[Action groups in tables only] The table object that this action group belongs to.'
      }],
      formFields: [{
        name: 'Field',
        type: 'Filament\\Forms\\Components\\Field',
        parameter: '$component',
        description: 'The current field component instance.'
      }, {
        name: 'Get function',
        type: 'Filament\\Schemas\\Components\\Utilities\\Get',
        parameter: '$get',
        description: 'A function for retrieving values from the current form data. Validation is not run.'
      }, {
        name: 'Eloquent model FQN',
        type: '?string<Illuminate\\Database\\Eloquent\\Model>',
        parameter: '$model',
        description: 'The Eloquent model FQN for the current schema.'
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'Raw state',
        type: 'mixed',
        parameter: '$rawState',
        description: 'The current value of the field, before state casts were applied. Validation is not run.'
      }, {
        name: 'State',
        type: 'mixed',
        parameter: '$state',
        description: 'The current value of the field. Validation is not run.'
      }, {
        name: 'Operation',
        type: 'string',
        parameter: '$operation',
        description: 'The current operation being performed by the schema. Usually <code>create</code>, <code>edit</code>, or <code>view</code>.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record for the current schema.'
      }],
      exportColumns: [{
        name: 'Export column',
        type: 'Filament\\Actions\\Exports\\ExportColumn',
        parameter: '$column',
        description: 'The current export column instance.'
      }, {
        name: 'Exporter',
        type: '?Filament\\Actions\\Exports\\Exporter',
        parameter: '$exporter',
        description: 'The instance of the exporter class that is currently being used for exporting data.'
      }, {
        name: 'Options',
        type: 'array<string, mixed>',
        parameter: '$options',
        description: 'The options that were defined when the export started.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record that is currently being exported.'
      }],
      importColumns: [{
        name: 'Import column',
        type: 'Filament\\Actions\\Imports\\ImportColumn',
        parameter: '$column',
        description: 'The current import column instance.'
      }, {
        name: 'Data',
        type: 'array<string, mixed>',
        parameter: '$data',
        description: 'The processed data for the record that is currently being imported.'
      }, {
        name: 'Importer',
        type: '?Filament\\Actions\\Imports\\Importer',
        parameter: '$importer',
        description: 'The instance of the importer class that is currently being used for importing data.'
      }, {
        name: 'Options',
        type: 'array<string, mixed>',
        parameter: '$options',
        description: 'The options that were defined when the import started.'
      }, {
        name: 'Original data',
        type: 'array<string, mixed>',
        parameter: '$originalData',
        description: 'The original data for the record that is currently being imported, before it was processed.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record that is currently being imported.'
      }],
      infolistEntries: [{
        name: 'Entry',
        type: 'Filament\\Infolists\\Components\\Entry',
        parameter: '$component',
        description: 'The current entry component instance.'
      }, {
        name: 'Get function',
        type: 'Filament\\Schemas\\Components\\Utilities\\Get',
        parameter: '$get',
        description: 'A function for retrieving values from the current schema data. Validation is not run on form fields.'
      }, {
        name: 'Eloquent model FQN',
        type: '?string<Illuminate\\Database\\Eloquent\\Model>',
        parameter: '$model',
        description: 'The Eloquent model FQN for the current schema.'
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'State',
        type: 'mixed',
        parameter: '$state',
        description: 'The current value of the entry.'
      }, {
        name: 'Operation',
        type: 'string',
        parameter: '$operation',
        description: 'The current operation being performed by the schema. Usually <code>create</code>, <code>edit</code>, or <code>view</code>.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record for the current schema.'
      }],
      schemaComponents: [{
        name: 'Component',
        type: 'Filament\\Schemas\\Components\\Component',
        parameter: '$component',
        description: 'The current component instance.'
      }, {
        name: 'Get function',
        type: 'Filament\\Schemas\\Components\\Utilities\\Get',
        parameter: '$get',
        description: 'A function for retrieving values from the current schema data. Validation is not run on form fields.'
      }, {
        name: 'Eloquent model FQN',
        type: '?string<Illuminate\\Database\\Eloquent\\Model>',
        parameter: '$model',
        description: 'The Eloquent model FQN for the current schema.'
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'Operation',
        type: 'string',
        parameter: '$operation',
        description: 'The current operation being performed by the schema. Usually <code>create</code>, <code>edit</code>, or <code>view</code>.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record for the current schema.'
      }],
      tableColumns: [{
        name: 'Column',
        type: 'Filament\\Tables\\Columns\\Column',
        parameter: '$column',
        description: 'The current column instance.'
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'Row loop',
        type: 'stdClass',
        parameter: '$rowLoop',
        description: 'The <a href="https://laravel.com/docs/blade#the-loop-variable" target="_blank">row loop</a> object for the current table row.'
      }, {
        name: 'State',
        type: 'mixed',
        parameter: '$state',
        description: 'The current value of the column, based on the current table row.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record for the current table row.'
      }, {
        name: 'Table',
        type: 'Filament\\Tables\\Table',
        parameter: '$table',
        description: 'The current table instance.'
      }],
      tableFilters: [{
        name: 'Filter',
        type: 'Filament\\Tables\\Filters\\BaseFilter',
        parameter: '$filter',
        description: 'The current filter instance.'
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'Table',
        type: 'Filament\\Tables\\Table',
        parameter: '$table',
        description: 'The current table instance.'
      }]
    }
  };
  const baseUtilities = utilitySets[version]?.[set] || [];
  let utilities = [...parsedExtras, ...baseUtilities].sort((a, b) => a.parameter > b.parameter ? 1 : -1);
  utilities = Array.from(new Map(utilities.map(utility => [utility.parameter, utility])).values());
  const exceptList = (except ?? '').split('||');
  utilities = utilities.filter(utility => !exceptList.includes(utility.parameter));
  const links = {
    actions: `/${version}/actions/overview#action-utility-injection`,
    actionGroups: `/${version}/actions/overview#action-utility-injection`,
    formFields: `/${version}/forms/overview#field-utility-injection`,
    infolistEntries: `/${version}/infolists/overview#entry-utility-injection`,
    schemaComponents: `/${version}/schemas/overview#component-utility-injection`,
    tableColumns: `/${version}/tables/columns/overview#column-utility-injection`,
    tableFilters: `/${version}/tables/filters/overview#filter-utility-injection`
  };
  const link = links[set] ?? null;
  const parseInlineCode = text => {
    if (typeof text !== 'string') return text;
    const parts = text.split(/(`[^`]+`)/);
    return parts.map((part, i) => {
      if (part.startsWith('`') && part.endsWith('`')) {
        return <code key={i} className="rounded bg-gray-100 px-1 py-0.5 font-mono text-xs dark:bg-white/10">
            {part.slice(1, -1)}
          </code>;
      }
      return part;
    });
  };
  return <details className="border-standard mt-4 rounded-xl">
      <summary className="not-prose flex w-full cursor-pointer list-none flex-row content-center items-start rounded-t-xl rounded-b-xl px-3.5 py-3 text-sm text-gray-600 hover:bg-white/20 hover:text-gray-900 dark:text-gray-300 dark:hover:bg-white/5 dark:hover:text-gray-200 [&::-webkit-details-marker]:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" className="mt-0.5 h-3.5 w-3.5 shrink-0 text-gray-400 transition-transform">
          <path d="m9 18 6-6-6-6" />
        </svg>

        <div className="ml-2 text-left leading-tight">
          {parseInlineCode(children)}
        </div>
      </summary>

      <div className="border-t border-gray-200 px-5 py-3 dark:border-white/10">
        {link && <p className="text-sm">
            <a href={link} target="_blank">
              Learn more about utility injection.
            </a>
          </p>}

        {utilities.map((utility, index) => <div key={index} className="border-b border-gray-200 py-3 last:border-b-0 dark:border-white/10">
            <div className="flex flex-wrap items-center gap-1.5 text-sm">
              <div>{utility.name}</div>
              <div className="text-primary dark:text-primary-light font-semibold">
                {utility.parameter}
              </div>
              <div className="rounded bg-gray-100 px-1.5 py-0.5 font-mono text-xs text-gray-500 dark:bg-white/10 dark:text-gray-400">
                {utility.type}
              </div>
            </div>
            <div className="mt-1.5 text-sm text-gray-600 dark:text-gray-400" dangerouslySetInnerHTML={{
    __html: utility.description
  }} />
          </div>)}
      </div>
    </details>;
};

export const AutoScreenshot = ({name, alt, version}) => {
  const [loaded, setLoaded] = useState(false);
  return <div className="not-prose border-standard relative mt-4 min-h-10 rounded-2xl">
      <div className={`absolute inset-0 flex items-center px-3.5 py-3 transition-opacity ${loaded ? 'opacity-0' : 'opacity-100'}`}>
        <svg className="h-4 w-4 animate-spin text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
          <circle className="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" strokeWidth="4" />
          <path className="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z" />
        </svg>
        <span className="ml-2 text-sm text-gray-600 dark:text-gray-300">
          Loading preview
        </span>
      </div>

      <img src={`/docs/images/${version}/light/${name}.jpg`} alt={alt} loading="lazy" decoding="async" onLoad={() => setLoaded(true)} className={`rounded-2xl transition-opacity dark:hidden ${loaded ? 'opacity-100' : 'opacity-0'}`} />

      <img src={`/docs/images/${version}/dark/${name}.jpg`} alt={alt} loading="lazy" decoding="async" onLoad={() => setLoaded(true)} className={`hidden rounded-2xl transition-opacity dark:block ${loaded ? 'opacity-100' : 'opacity-0'}`} />
    </div>;
};

export const EditOnGitHub = ({version, path}) => {
  const url = `https://github.com/filamentphp/filament/edit/${version}/${path}`;
  return <div className="not-prose mt-16">
      <a href={url} target="_blank" rel="noopener noreferrer" className="inline-flex items-center gap-2 text-sm text-gray-500 transition hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" className="h-4 w-4">
          <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z" />
        </svg>
        Edit this page on GitHub
      </a>
    </div>;
};

export const Footer = () => {
  const sponsorsByTier = JSON.parse(`{
  "agency_partner": [
    {
      "name": "Kirschbaum",
      "url": "https://kirschbaumdevelopment.com/solutions/filament-development",
      "filename": "kirschbaum.svg"
    }
  ],
  "gold": [
    {
      "name": "Agiledrop",
      "url": "https://www.agiledrop.com/laravel?utm_source=filament",
      "filename": "agiledrop.svg"
    },
    {
      "name": "Baiz.ai",
      "url": "https://baiz.ai",
      "filename": "baiz-ai.svg"
    },
    {
      "name": "CMS Max",
      "url": "https://cmsmax.com?ref=filamentphp.com",
      "filename": "cms-max.svg"
    },
    {
      "name": "Mailtrap",
      "url": "https://mailtrap.io/email-sending?utm_source=community&utm_medium=referral&utm_campaign=filament",
      "filename": "mailtrap.svg"
    },
    {
      "name": "SerpApi",
      "url": "https://serpapi.com/?utm_source=filamentphp",
      "filename": "serpapi.svg"
    }
  ]
}`);
  function shuffleArray(items) {
    const result = [...items];
    for (let index = result.length - 1; index > 0; index--) {
      const randomIndex = Math.floor(Math.random() * (index + 1));
      [result[index], result[randomIndex]] = [result[randomIndex], result[index]];
    }
    return result;
  }
  const sponsors = Object.entries(sponsorsByTier).flatMap(([, sponsors]) => shuffleArray(sponsors));
  return <div className="mt-16 flex flex-col gap-4">
      <h2 className="text-center text-2xl font-medium text-gray-800 dark:text-gray-200">
        Sponsored by
      </h2>

      <div className="not-prose flex flex-wrap items-center justify-center gap-5">
        {sponsors.map(sponsor => <a key={sponsor.name} className="footer-sponsor-card" href={sponsor.url} target="_blank" title={sponsor.name}>
            <img src={`/docs/images/sponsors/footer/${sponsor.filename}`} alt={sponsor.name} noZoom />
            <span className="line-pattern-overlay line-pattern-80" />
          </a>)}

        <a href="https://github.com/sponsors/danharrin" target="_blank" className="footer-sponsor-cta">
          <span className="sponsor-cta-content">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round">
              <path d="M5 12h14" />
              <path d="M12 5v14" />
            </svg>
            <span>Your logo here</span>
          </span>
          <span className="line-pattern-overlay line-pattern-60" />
        </a>
      </div>
    </div>;
};

## Introduction

<AutoScreenshot name="forms/overview" alt="Account settings form example" version="5.x" />

Filament's forms package allows you to easily build dynamic forms in your app. It's used within other Filament packages to render forms within [panel resources](../resources), [action modals](../actions/modals), [table filters](../tables/filters), and more. Learning how to build forms is essential to learning how to use these Filament packages.

This guide will walk you through the basics of building forms with Filament's form package. If you're planning to add a new form to your own Livewire component, you should [do that first](../components/form) and then come back. If you're adding a form to a [panel resource](../resources), or another Filament package, you're ready to go!

## Form fields

Form field classes can be found in the `Filament\Form\Components` namespace. They reside within the schema array of components. Filament ships with many types of field, suitable for editing different types of data:

* [Text input](./text-input)
* [Select](./select)
* [Checkbox](./checkbox)
* [Toggle](./toggle)
* [Checkbox list](./checkbox-list)
* [Radio](./radio)
* [Date-time picker](./date-time-picker)
* [File upload](./file-upload)
* [Rich editor](./rich-editor)
* [Markdown editor](./markdown-editor)
* [Repeater](./repeater)
* [Builder](./builder)
* [Tags input](./tags-input)
* [Textarea](./textarea)
* [Key-value](./key-value)
* [Color picker](./color-picker)
* [Toggle buttons](./toggle-buttons)
* [Slider](./slider)
* [Code editor](./code-editor)
* [Hidden](./hidden)

You may also [create your own custom fields](./custom-fields) to edit data however you wish.

Fields may be created using the static `make()` method, passing its unique name. Usually, the name of a field corresponds to the name of an attribute on an Eloquent model:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;

TextInput::make('name')
```

<AutoScreenshot name="forms/fields/simple" alt="Form field" version="5.x" />

You may use "dot notation" to bind fields to keys in arrays:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;

TextInput::make('socials.github_url')
```

## Validating fields

In Laravel, validation rules are usually defined in arrays like `['required', 'max:255']` or a combined string like `required|max:255`. This is fine if you're exclusively working in the backend with simple form requests. But Filament is also able to give your users frontend validation, so they can fix their mistakes before any backend requests are made.

In Filament, you can add validation rules to your fields by using methods like `required()` and `maxLength()`. This is also advantageous over Laravel's validation syntax, since your IDE can autocomplete these methods:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;

TextInput::make('name')
    ->required()
    ->maxLength(255)
```

In this example, the fields is `required()`, and has a `maxLength()`. We have [methods for most of Laravel's validation rules](./validation#available-rules), and you can even add your own [custom rules](./validation#custom-rules).

## Setting a field's label

By default, the label of the field will be automatically determined based on its name. To override the field's label, you may use the `label()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;

TextInput::make('name')
    ->label('Full name')
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `label()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

Customizing the label in this way is useful if you wish to use a [translation string for localization](https://laravel.com/docs/localization#retrieving-translation-strings):

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;

TextInput::make('name')
    ->label(__('fields.name'))
```

<Tip>
  You can also [use a JavaScript expression](#using-javascript-to-determine-text-content) to determine the content of the label, which can read the current values of fields in the form.
</Tip>

### Hiding a field's label

It may be tempting to set the label to an empty string to hide it, but this is not recommended. Setting the label to an empty string will not communicate the purpose of the field to screen readers, even if the purpose is clear visually. Instead, you should use the `hiddenLabel()` method, so it is hidden visually but still accessible to screen readers:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;

TextInput::make('name')
    ->hiddenLabel()
```

<AutoScreenshot name="forms/fields/hidden-label" alt="Form field with a hidden label" version="5.x" />

Optionally, you may pass a boolean value to control if the label should be hidden or not:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;

TextInput::make('name')
    ->hiddenLabel(FeatureFlag::active())
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `hiddenLabel()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

## Setting the default value of a field

Fields may have a default value. The default is only used when a schema is loaded with no data. In a standard [panel resource](../resources), defaults are used on the Create page, not the Edit page. To define a default value, use the `default()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;

TextInput::make('name')
    ->default('John')
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `default()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

## Disabling a field

You may disable a field to prevent it from being edited by the user:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;

TextInput::make('name')
    ->disabled()
```

<AutoScreenshot name="forms/fields/disabled" alt="Disabled form field" version="5.x" />

Optionally, you may pass a boolean value to control if the field should be disabled or not:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Toggle;

Toggle::make('is_admin')
    ->disabled(! FeatureFlag::active())
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `disabled()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

Disabling a field will prevent it from being saved. If you'd like it to be saved, but still not editable, use the `saved()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Toggle;

Toggle::make('is_admin')
    ->disabled()
    ->saved()
```

<Danger>
  If you choose to save the field when disabled, a skilled user could still edit the field's value by manipulating Livewire's JavaScript.
</Danger>

Optionally, you may pass a boolean value to control if the field should be saved or not:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Toggle;

Toggle::make('is_admin')
    ->disabled()
    ->saved(FeatureFlag::active())
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `saved()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

### Disabling a field based on the current operation

The "operation" of a schema is the current action being performed on it. Usually, this is either `create`, `edit` or `view`, if you are using the [panel resource](../resources).

You can disable a field based on the current operation by passing an operation to the `disabledOn()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Toggle;

Toggle::make('is_admin')
    ->disabledOn('edit')

// is the same as

Toggle::make('is_admin')
    ->disabled(fn (string $operation): bool => $operation === 'edit')
```

You can also pass an array of operations to the `disabledOn()` method, and the field will be disabled if the current operation is any of the operations in the array:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Toggle;

Toggle::make('is_admin')
    ->disabledOn(['edit', 'view'])
    
// is the same as

Toggle::make('is_admin')
    ->disabled(fn (string $operation): bool => in_array($operation, ['edit', 'view']))
```

<Warning>
  The `disabledOn()` method will overwrite any previous calls to the `disabled()` method, and vice versa.
</Warning>

## Hiding a field

You may hide a field:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;

TextInput::make('name')
    ->hidden()
```

Optionally, you may pass a boolean value to control if the field should be hidden or not:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;

TextInput::make('name')
    ->hidden(! FeatureFlag::active())
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `hidden()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

Alternatively, you may use the `visible()` method to control if the field should be hidden or not. In some situations, this may help to make your code more readable:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;

TextInput::make('name')
    ->visible(FeatureFlag::active())
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `visible()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

<Info>
  If both `hidden()` and `visible()` are used, they both need to indicate that the field should be visible for it to be shown.
</Info>

### Hiding a field using JavaScript

If you need to hide a field based on a user interaction, you can use the `hidden()` or `visible()` methods, passing a function that uses utilities injected to determine whether the field should be hidden or not:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;

Select::make('role')
    ->options([
        'user' => 'User',
        'staff' => 'Staff',
    ])
    ->live()

Toggle::make('is_admin')
    ->hidden(fn (Get $get): bool => $get('role') !== 'staff')
```

In this example, the `role` field is set to `live()`, which means that the schema will reload the schema each time the `role` field is changed. This will cause the function that is passed to the `hidden()` method to be re-evaluated, which will hide the `is_admin` field if the `role` field is not set to `staff`.

However, reloading the schema each time a field causes a network request to be made, since there is no way to re-run the PHP function from the client-side. This is not ideal for performance.

Alternatively, you can write JavaScript to hide the field based on the value of another field. This is done by passing a JavaScript expression to the `hiddenJs()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;

Select::make('role')
    ->options([
        'user' => 'User',
        'staff' => 'Staff',
    ])

Toggle::make('is_admin')
    ->hiddenJs(<<<'JS'
        $get('role') !== 'staff'
        JS)
```

Although the code passed to `hiddenJs()` looks very similar to PHP, it is actually JavaScript. Filament provides the `$get()` utility function to JavaScript that behaves very similar to its PHP equivalent, but without requiring the depended-on field to be `live()`.

<Danger>
  Any JavaScript string passed to the `hiddenJs()` method will be executed in the browser, so you should never add user input directly into the string, as it could lead to cross-site scripting (XSS) vulnerabilities. User input from `$state` or `$get()` should never be evaluated as JavaScript code, but is safe to use as a string value, like in the example above.
</Danger>

The `visibleJs()` method is also available, which works in the same way as `hiddenJs()`, but controls if the field should be visible or not:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;

Select::make('role')
    ->options([
        'user' => 'User',
        'staff' => 'Staff',
    ])

Toggle::make('is_admin')
    ->visibleJs(<<<'JS'
        $get('role') === 'staff'
        JS)
```

<Danger>
  Any JavaScript string passed to the `visibleJs()` method will be executed in the browser, so you should never add user input directly into the string, as it could lead to cross-site scripting (XSS) vulnerabilities. User input from `$state` or `$get()` should never be evaluated as JavaScript code, but is safe to use as a string value, like in the example above.
</Danger>

<Info>
  If both `hiddenJs()` and `visibleJs()` are used, they both need to indicate that the field should be visible for it to be shown.
</Info>

### Hiding a field based on the current operation

The "operation" of a schema is the current action being performed on it. Usually, this is either `create`, `edit` or `view`, if you are using the [panel resource](../resources).

You can hide a field based on the current operation by passing an operation to the `hiddenOn()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Toggle;

Toggle::make('is_admin')
    ->hiddenOn('edit')
    
// is the same as

Toggle::make('is_admin')
    ->hidden(fn (string $operation): bool => $operation === 'edit')
```

You can also pass an array of operations to the `hiddenOn()` method, and the field will be hidden if the current operation is any of the operations in the array:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Toggle;

Toggle::make('is_admin')
    ->hiddenOn(['edit', 'view'])
    
// is the same as

Toggle::make('is_admin')
    ->hidden(fn (string $operation): bool => in_array($operation, ['edit', 'view']))
```

<Warning>
  The `hiddenOn()` method will overwrite any previous calls to the `hidden()` method, and vice versa.
</Warning>

Alternatively, you may use the `visibleOn()` method to control if the field should be hidden or not. In some situations, this may help to make your code more readable:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Toggle;

Toggle::make('is_admin')
    ->visibleOn('create')

Toggle::make('is_admin')
    ->visibleOn(['create', 'edit'])
```

<Info>
  The `visibleOn()` method will overwrite any previous calls to the `visible()` method, and vice versa.
</Info>

## Inline labels

Fields may have their labels displayed inline with the field, rather than above it. This is useful for forms with many fields, where vertical space is at a premium. To display a field's label inline, use the `inlineLabel()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;

TextInput::make('name')
    ->inlineLabel()
```

<AutoScreenshot name="forms/fields/inline-label" alt="Form field with inline label" version="5.x" />

Optionally, you may pass a boolean value to control if the label should be displayed inline or not:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;

TextInput::make('name')
    ->inlineLabel(FeatureFlag::active())
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `inlineLabel()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

### Using inline labels in multiple places at once

If you wish to display all labels inline in a [layout component](../schemas/layouts) like a [section](../schemas/sections) or [tab](../schemas/tabs), you can use the `inlineLabel()` on the component itself, and all fields within it will have their labels displayed inline:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;

Section::make('Details')
    ->inlineLabel()
    ->schema([
        TextInput::make('name'),
        TextInput::make('email')
            ->label('Email address'),
        TextInput::make('phone')
            ->label('Phone number'),
    ])
```

<AutoScreenshot name="forms/fields/inline-label/section" alt="Form fields with inline labels in a section" version="5.x" />

You can also use `inlineLabel()` on the entire schema to display all labels inline:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Schemas\Schema;

public function form(Schema $schema): Schema
{
    return $schema
        ->inlineLabel()
        ->components([
            // ...
        ]);
}
```

When using `inlineLabel()` on a layout component or schema, you can still opt-out of inline labels for individual fields by using the `inlineLabel(false)` method on the field:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;

Section::make('Details')
    ->inlineLabel()
    ->schema([
        TextInput::make('name'),
        TextInput::make('email')
            ->label('Email address'),
        TextInput::make('phone')
            ->label('Phone number')
            ->inlineLabel(false),
    ])
```

## Autofocusing a field when the schema is loaded

Most fields are autofocusable. Typically, you should aim for the first significant field in your schema to be autofocused for the best user experience. You can nominate a field to be autofocused using the `autofocus()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;

TextInput::make('name')
    ->autofocus()
```

Optionally, you may pass a boolean value to control if the field should be autofocused or not:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;

TextInput::make('name')
    ->autofocus(FeatureFlag::active())
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `autofocus()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

## Setting the placeholder of a field

Many fields can display a placeholder for when they have no value. This is displayed in the UI but never saved when the form is submitted. You may customize this placeholder using the `placeholder()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;

TextInput::make('name')
    ->placeholder('John Doe')
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `placeholder()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

<AutoScreenshot name="forms/fields/placeholder" alt="Form field with placeholder" version="5.x" />

## Fusing fields together into a group

A `FusedGroup` component can be used to "fuse" multiple fields together. The following fields can be fused together the best:

* [Text input](./text-input)
* [Select](./select)
* [Date-time picker](./date-time-picker)
* [Color picker](./color-picker)

The fields that should be fused are passed to the `make()` method of the `FusedGroup` component:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\FusedGroup;

FusedGroup::make([
    TextInput::make('city')
        ->placeholder('City'),
    Select::make('country')
        ->placeholder('Country')
        ->options([
            // ...
        ]),
])
```

<AutoScreenshot name="forms/fields/fused" alt="Fused group of form fields" version="5.x" />

You can add a label above the group of fields using the `label()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Schemas\Components\FusedGroup;

FusedGroup::make([
    // ...
])
    ->label('Location')
```

<AutoScreenshot name="forms/fields/fused-label" alt="Fused group of form fields with label" version="5.x" />

By default, each field will have its own row. On mobile devices, this is often the most optimal experience, but on desktop you can use the `columns()` method, the same as for [layout components](../schemas/layouts#grid-system) to display the fields horizontally:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Schemas\Components\FusedGroup;

FusedGroup::make([
    // ...
])
    ->label('Location')
    ->columns(2)
```

<AutoScreenshot name="forms/fields/fused-columns" alt="Fused group of form fields in columns" version="5.x" />

You can adjust the width of the fields in the grid by passing `columnSpan()` to each field:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\FusedGroup;

FusedGroup::make([
    TextInput::make('city')
        ->placeholder('City')
        ->columnSpan(2),
    Select::make('country')
        ->placeholder('Country')
        ->options([
            // ...
        ]),
])
    ->label('Location')
    ->columns(3)
```

<AutoScreenshot name="forms/fields/fused-columns-span" alt="Fused group of form fields in columns with customized span" version="5.x" />

## Adding extra content to a field

Fields contain many "slots" where content can be inserted in a child schema. Slots can accept text, [any schema component](../schemas), [actions](../actions) and [action groups](../actions/grouping-actions). Usually, [prime components](../schemas/primes) are used for content.

The following slots are available for all fields:

* `aboveLabel()`
* `beforeLabel()`
* `afterLabel()`
* `belowLabel()`
* `aboveContent()`
* `beforeContent()`
* `afterContent()`
* `belowContent()`
* `aboveErrorMessage()`
* `belowErrorMessage()`

<UtilityInjection set="formFields" version="5.x">As well as allowing static values, the slot methods also accept functions to dynamically calculate them. You can inject various utilities into the functions as parameters.</UtilityInjection>

To insert plain text, you can pass a string to these methods:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;

TextInput::make('name')
    ->belowContent('This is the user\'s full name.')
```

<AutoScreenshot name="forms/fields/below-content/text" alt="Form field with text below content" version="5.x" />

To insert a schema component, often a [prime component](../schemas/primes), you can pass the component to the method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Text;
use Filament\Support\Enums\FontWeight;

TextInput::make('name')
    ->belowContent(Text::make('This is the user\'s full name.')->weight(FontWeight::Bold))
```

<AutoScreenshot name="forms/fields/below-content/component" alt="Form field with component below content" version="5.x" />

To insert an [action](../actions) or [action group](../actions/grouping-actions), you can pass the action or action group to the method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;

TextInput::make('name')
    ->belowContent(Action::make('generate'))
```

<AutoScreenshot name="forms/fields/below-content/action" alt="Form field with action below content" version="5.x" />

<Tip>
  If you need a simple action that runs JavaScript without making a network request, you can use the [`actionJs()` method](../actions/overview#running-javascript-when-an-action-is-clicked). This is useful for simple interactions like updating form field values using `$get()` and `$set()`. Actions using `actionJs()` cannot open modals.
</Tip>

You can insert any combination of content into the slots by passing an array of content to the method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Icon;
use Filament\Support\Icons\Heroicon;

TextInput::make('name')
    ->belowContent([
        Icon::make(Heroicon::InformationCircle),
        'This is the user\'s full name.',
        Action::make('generate'),
    ])
```

<AutoScreenshot name="forms/fields/below-content" alt="Form field with multiple components below content" version="5.x" />

You can also align the content in the slots by passing the array of content to either `Schema::start()` (default), `Schema::end()` or `Schema::between()`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Flex;
use Filament\Schemas\Components\Icon;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

TextInput::make('name')
    ->belowContent(Schema::end([
        Icon::make(Heroicon::InformationCircle),
        'This is the user\'s full name.',
        Action::make('generate'),
    ]))

TextInput::make('name')
    ->belowContent(Schema::between([
        Icon::make(Heroicon::InformationCircle),
        'This is the user\'s full name.',
        Action::make('generate'),
    ]))

TextInput::make('name')
    ->belowContent(Schema::between([
        Flex::make([
            Icon::make(Heroicon::InformationCircle)
                ->grow(false),
            'This is the user\'s full name.',
        ]),
        Action::make('generate'),
    ]))
```

<Tip>
  As you can see in the above example for `Schema::between()`, a [`Flex` component](../schemas/layouts#flex-component) is used to group the icon and text together so they do not have space between them. The icon uses `grow(false)` to prevent it from taking up half of the horizontal space, allowing the text to consume the remaining space.
</Tip>

<AutoScreenshot name="forms/fields/below-content/alignment" alt="Form field with aligned components below content" version="5.x" />

### Adding extra content above a field's label

You can insert extra content above a field's label using the `aboveLabel()` method. You can [pass any content](#adding-extra-content-to-a-field) to this method, like text, a schema component, an action, or an action group:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Icon;
use Filament\Support\Icons\Heroicon;

TextInput::make('name')
    ->aboveLabel([
        Icon::make(Heroicon::Star),
        'This is the content above the field\'s label'
    ])
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `aboveLabel()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

<AutoScreenshot name="forms/fields/above-label" alt="Form field with extra content above label" version="5.x" />

### Adding extra content before a field's label

You can insert extra content before a field's label using the `beforeLabel()` method. You can [pass any content](#adding-extra-content-to-a-field) to this method, like text, a schema component, an action, or an action group:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Icon;
use Filament\Support\Icons\Heroicon;

TextInput::make('name')
    ->beforeLabel(Icon::make(Heroicon::Star))
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `beforeLabel()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

<AutoScreenshot name="forms/fields/before-label" alt="Form field with extra content before label" version="5.x" />

### Adding extra content after a field's label

You can insert extra content after a field's label using the `afterLabel()` method. You can [pass any content](#adding-extra-content-to-a-field) to this method, like text, a schema component, an action, or an action group:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Icon;
use Filament\Support\Icons\Heroicon;

TextInput::make('name')
    ->afterLabel([
        Icon::make(Heroicon::Star),
        'This is the content after the field\'s label'
    ])
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `afterLabel()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

<AutoScreenshot name="forms/fields/after-label" alt="Form field with extra content after label" version="5.x" />

By default, the content in the `afterLabel()` schema is aligned to the end of the container. If you wish to align it to the start of the container, you should pass a `Schema::start()` object containing the content:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Icon;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

TextInput::make('name')
    ->afterLabel(Schema::start([
        Icon::make(Heroicon::Star),
        'This is the content after the field\'s label'
    ]))
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `afterLabel()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

<AutoScreenshot name="forms/fields/after-label/aligned-start" alt="Form field with extra content after label aligned to the start" version="5.x" />

### Adding extra content below a field's label

You can insert extra content below a field's label using the `belowLabel()` method. You can [pass any content](#adding-extra-content-to-a-field) to this method, like text, a schema component, an action, or an action group:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Icon;
use Filament\Support\Icons\Heroicon;

TextInput::make('name')
    ->belowLabel([
        Icon::make(Heroicon::Star),
        'This is the content below the field\'s label'
    ])
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `belowLabel()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

<AutoScreenshot name="forms/fields/below-label" alt="Form field with extra content below label" version="5.x" />

<Info>
  This may seem like the same as the [`aboveContent()` method](#adding-extra-content-above-a-fields-content). However, when using [inline labels](#inline-labels), the `aboveContent()` method will place the content above the field, not below the label, since the label is displayed in a separate column to the field content.
</Info>

### Adding extra content above a field's content

You can insert extra content above a field's content using the `aboveContent()` method. You can [pass any content](#adding-extra-content-to-a-field) to this method, like text, a schema component, an action, or an action group:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Icon;
use Filament\Support\Icons\Heroicon;

TextInput::make('name')
    ->aboveContent([
        Icon::make(Heroicon::Star),
        'This is the content above the field\'s content'
    ])
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `aboveContent()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

<AutoScreenshot name="forms/fields/above-content" alt="Form field with extra content above content" version="5.x" />

<Info>
  This may seem like the same as the [`belowLabel()` method](#adding-extra-content-below-a-fields-label). However, when using [inline labels](#inline-labels), the `belowLabel()` method will place the content below the label, not above the field's content, since the label is displayed in a separate column to the field content.
</Info>

### Adding extra content before a field's content

You can insert extra content before a field's content using the `beforeContent()` method. You can [pass any content](#adding-extra-content-to-a-field) to this method, like text, a schema component, an action, or an action group:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Icon;
use Filament\Support\Icons\Heroicon;

TextInput::make('name')
    ->beforeContent(Icon::make(Heroicon::Star))
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `beforeContent()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

<AutoScreenshot name="forms/fields/before-content" alt="Form field with extra content before content" version="5.x" />

<Tip>
  Some fields, such as the [text input](./text-input#adding-affix-text-aside-the-field), [select](./select#adding-affix-text-aside-the-field), and [date-time picker](./date-time-picker#adding-affix-text-aside-the-field) fields, have a `prefix()` method to insert content before the field's content, adjoined to the field itself. This is often a better UI choice than using `beforeContent()`.

  <AutoScreenshot name="forms/fields/text-input/affix" alt="Text input with affixes" version="5.x" />
</Tip>

### Adding extra content after a field's content

You can insert extra content after a field's content using the `afterContent()` method. You can [pass any content](#adding-extra-content-to-a-field) to this method, like text, a schema component, an action, or an action group:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Icon;
use Filament\Support\Icons\Heroicon;

TextInput::make('name')
    ->afterContent(Icon::make(Heroicon::Star))
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `afterContent()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

<AutoScreenshot name="forms/fields/after-content" alt="Form field with extra content after content" version="5.x" />

<Tip>
  Some fields, such as the [text input](./text-input#adding-affix-text-aside-the-field), [select](./select#adding-affix-text-aside-the-field), and [date-time picker](./date-time-picker#adding-affix-text-aside-the-field) fields, have a `suffix()` method to insert content after the field's content, adjoined to the field itself. This is often a better UI choice than using `beforeContent()`.

  <AutoScreenshot name="forms/fields/text-input/affix" alt="Text input with affixes" version="5.x" />
</Tip>

### Adding extra content above a field's error message

You can insert extra content above a field's [error message](./validation) using the `aboveErrorMessage()` method. It will not be visible unless an error message is displayed. You can [pass any content](#adding-extra-content-to-a-field) to this method, like text, a schema component, an action, or an action group:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Icon;
use Filament\Support\Icons\Heroicon;

TextInput::make('name')
    ->required()
    ->aboveErrorMessage([
        Icon::make(Heroicon::Star),
        'This is the content above the field\'s error message'
    ])
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `aboveErrorMessage()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

<AutoScreenshot name="forms/fields/above-error-message" alt="Form field with extra content above error message" version="5.x" />

### Adding extra content below a field's error message

You can insert extra content below a field's [error message](./validation) using the `belowErrorMessage()` method. It will not be visible unless an error message is displayed. You can [pass any content](#adding-extra-content-to-a-field) to this method, like text, a schema component, an action, or an action group:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Icon;
use Filament\Support\Icons\Heroicon;

TextInput::make('name')
    ->required()
    ->belowErrorMessage([
        Icon::make(Heroicon::Star),
        'This is the content below the field\'s error message'
    ])
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `belowErrorMessage()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

<AutoScreenshot name="forms/fields/below-error-message" alt="Form field with extra content below error message" version="5.x" />

## Adding extra HTML attributes to a field

You can pass extra HTML attributes to the field via the `extraAttributes()` method, which will be merged onto its outer HTML element. The attributes should be represented by an array, where the key is the attribute name and the value is the attribute value:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;

TextInput::make('name')
    ->extraAttributes(['title' => 'Text input'])
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `extraAttributes()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

<Tip>
  By default, calling `extraAttributes()` multiple times will overwrite the previous attributes. If you wish to merge the attributes instead, you can pass `merge: true` to the method.
</Tip>

### Adding extra HTML attributes to the input element of a field

Some fields use an underlying `<input>` or `<select>` DOM element, but this is often not the outer element in the field, so the `extraAttributes()` method may not work as you wish. In this case, you may use the `extraInputAttributes()` method, which will merge the attributes onto the `<input>` or `<select>` element in the field's HTML:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;

TextInput::make('categories')
    ->extraInputAttributes(['width' => 200])
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `extraInputAttributes()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

<Tip>
  By default, calling `extraInputAttributes()` multiple times will overwrite the previous attributes. If you wish to merge the attributes instead, you can pass `merge: true` to the method.
</Tip>

### Adding extra HTML attributes to the field wrapper

You can also pass extra HTML attributes to the very outer element of the "field wrapper" which surrounds the label and content of the field. This is useful if you want to style the label or spacing of the field via CSS, since you could target elements as children of the wrapper:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;

TextInput::make('categories')
    ->extraFieldWrapperAttributes(['class' => 'components-locked'])
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `extraFieldWrapperAttributes()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

<Tip>
  By default, calling `extraFieldWrapperAttributes()` multiple times will overwrite the previous attributes. If you wish to merge the attributes instead, you can pass `merge: true` to the method.
</Tip>

## Field utility injection

The vast majority of methods used to configure fields accept functions as parameters instead of hardcoded values:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Models\User;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

DatePicker::make('date_of_birth')
    ->displayFormat(function (): string {
        if (auth()->user()->country_id === 'us') {
            return 'm/d/Y';
        }

        return 'd/m/Y';
    })

Select::make('user_id')
    ->options(function (): array {
        return User::query()->pluck('name', 'id')->all();
    })

TextInput::make('middle_name')
    ->required(fn (): bool => auth()->user()->hasMiddleName())
```

This alone unlocks many customization possibilities.

The package is also able to inject many utilities to use inside these functions, as parameters. All customization methods that accept functions as arguments can inject utilities.

These injected utilities require specific parameter names to be used. Otherwise, Filament doesn't know what to inject.

### Injecting the current state of the field

If you wish to access the current value (state) of the field, define a `$state` parameter:

```php theme={"theme":"gruvbox-dark-hard"}
function ($state) {
    // ...
}
```

#### Injecting the raw state of the field

If a field casts its state automatically to a more useful format, you may wish to access the raw state. To do this, define a `$rawState` parameter:

```php theme={"theme":"gruvbox-dark-hard"}
function ($rawState) {
    // ...
}
```

### Injecting the state of another field

You may also retrieve the state (value) of another field from within a callback, using a `$get` parameter:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Schemas\Components\Utilities\Get;

function (Get $get) {
    $email = $get('email'); // Store the value of the `email` field in the `$email` variable.
    //...
}
```

<Tip>
  Unless a form field is [reactive](#the-basics-of-reactivity), the schema will not refresh when the value of the field changes, only when the next user interaction occurs that makes a request to the server. If you need to react to changes in a field's value, it should be `live()`.
</Tip>

#### Type-safe retrieval of another field's state

You may use a "typed" method on the `Get` utility to retrieve the state of another field in a type-safe manner:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Schemas\Components\Utilities\Get;

$get->string('email');
$get->integer('age');
$get->float('price');
$get->boolean('is_admin');
$get->array('tags');
$get->date('published_at');
$get->enum('status', StatusEnum::class);
$get->filled('email'); // Returns the result of the `filled()` helper for the field.
$get->blank('email'); // Returns the result of the `blank()` helper for the field.
```

Each method assumes that the field's state can't be `null`. To force a nullable return type, pass the `isNullable: true` argument:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Schemas\Components\Utilities\Get;

$get->string('email', isNullable: true);
```

### Injecting the current Eloquent record

You may retrieve the Eloquent record for the current schema using a `$record` parameter:

```php theme={"theme":"gruvbox-dark-hard"}
use Illuminate\Database\Eloquent\Model;

function (?Model $record) {
    // ...
}
```

### Injecting the current operation

If you're writing a schema for a panel resource or relation manager, and you wish to check if a schema is `create`, `edit` or `view`, use the `$operation` parameter:

```php theme={"theme":"gruvbox-dark-hard"}
function (string $operation) {
    // ...
}
```

<Info>
  You can manually set a schema's operation using the `$schema->operation()` method.
</Info>

### Injecting the current Livewire component instance

If you wish to access the current Livewire component instance, define a `$livewire` parameter:

```php theme={"theme":"gruvbox-dark-hard"}
use Livewire\Component;

function (Component $livewire) {
    // ...
}
```

### Injecting the current field instance

If you wish to access the current component instance, define a `$component` parameter:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Field;

function (Field $component) {
    // ...
}
```

### Injecting multiple utilities

The parameters are injected dynamically using reflection, so you are able to combine multiple parameters in any order:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Livewire\Component as Livewire;

function (Livewire $livewire, Get $get, Set $set) {
    // ...
}
```

### Injecting dependencies from Laravel's container

You may inject anything from Laravel's container like normal, alongside utilities:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Schemas\Components\Utilities\Set;
use Illuminate\Http\Request;

function (Request $request, Set $set) {
    // ...
}
```

### Using JavaScript to determine text content

Methods that allow HTML to be rendered, such as [`label()`](#setting-a-fields-label) and [`Text::make()` passed to a `belowContent()` method](#adding-extra-content-to-a-field) can use JavaScript to calculate their content instead. This is achieved by passing a `JsContent` object to the method, which is `Htmlable`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;
use Filament\Schemas\JsContent;

TextInput::make('greetingResponse')
    ->label(JsContent::make(<<<'JS'
        ($get('name') === 'John Doe') ? 'Hello, John!' : 'Hello, stranger!'
        JS
    ))
```

The [`$state`](#injecting-the-current-state-of-the-field) and [`$get`](#injecting-the-state-of-another-field) utilities are available in this JavaScript context, so you can use them to access the state of the field and other fields in the schema.

## The basics of reactivity

[Livewire](https://livewire.laravel.com) is a tool that allows Blade-rendered HTML to dynamically re-render without requiring a full page reload. Filament schemas are built on top of Livewire, so they are able to re-render dynamically, allowing their content to adapt after they are initially rendered.

By default, when a user uses a field, the schema will not re-render. Since rendering requires a round-trip to the server, this is a performance optimization. However, if you wish to re-render the schema after the user has interacted with a field, you can use the `live()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Select;

Select::make('status')
    ->options([
        'draft' => 'Draft',
        'reviewing' => 'Reviewing',
        'published' => 'Published',
    ])
    ->live()
```

In this example, when the user changes the value of the `status` field, the schema will re-render. This allows you to then make changes to fields in the schema based on the new value of the `status` field. Also, you can [hook in to the field's lifecycle](#field-updates) to perform custom logic when the field is updated.

### Reactive fields on blur

By default, when a field is set to `live()`, the schema will re-render every time the field is interacted with. However, this may not be appropriate for some fields like the text input, since making network requests while the user is still typing results in suboptimal performance. You may wish to re-render the schema only after the user has finished using the field, when it becomes out of focus. You can do this using the `live(onBlur: true)` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;

TextInput::make('username')
    ->live(onBlur: true)
```

### Debouncing reactive fields

You may wish to find a middle ground between `live()` and `live(onBlur: true)`, using "debouncing". Debouncing will prevent a network request from being sent until a user has finished typing for a certain period of time. You can do this using the `live(debounce: 500)` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;

TextInput::make('username')
    ->live(debounce: 500) // Wait 500ms before re-rendering the schema.
```

In this example, `500` is the number of milliseconds to wait before sending a network request. You can customize this number to whatever you want, or even use a string like `'1s'`.

## Field lifecycle

Each field in a schema has a lifecycle, which is the process it goes through when the schema is loaded, when it is interacted with by the user, and when it is submitted. You may customize what happens at each stage of this lifecycle using a function that gets run at that stage.

### Field hydration

Hydration is the process that fills fields with data. It runs when you call the schema's `fill()` method. You may customize what happens after a field is hydrated using the `afterStateHydrated()` method.

In this example, the `name` field will always be hydrated with the correctly capitalized name:

```php theme={"theme":"gruvbox-dark-hard"}
use Closure;
use Filament\Forms\Components\TextInput;

TextInput::make('name')
    ->required()
    ->afterStateHydrated(function (TextInput $component, string $state) {
        $component->state(ucwords($state));
    })
```

As a shortcut for formatting the field's state like this when it is hydrated, you can use the `formatStateUsing()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Closure;
use Filament\Forms\Components\TextInput;

TextInput::make('name')
    ->formatStateUsing(fn (string $state): string => ucwords($state))
```

### Field updates

You may use the `afterStateUpdated()` method to customize what happens after the user updates a field:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;

TextInput::make('name')
    ->afterStateUpdated(function (?string $state, ?string $old) {
        // ...
    })
```

<UtilityInjection set="formFields" version="5.x" extras="Old state;;mixed;;$old;;The old value of the field, before it was updated.||Old raw state;;mixed;;$oldRaw;;The old value of the field, before state casts were applied.||Set function;;Filament\Schemas\Components\Utilities\Set;;$set;;A function to set values in the current form data.">The `afterStateUpdated()` method injects various utilities into the function as parameters.</UtilityInjection>

<Tip>
  When using `afterStateUpdated()` on a reactive field, interactions will not feel instant since a network request is made. There are a few ways you can [optimize and avoid rendering](#field-rendering) which will make the interaction feel faster.
</Tip>

#### Setting the state of another field

In a similar way to `$get`, you may also set the value of another field from within `afterStateUpdated()`, using a `$set` parameter:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Schemas\Components\Utilities\Set;

function (Set $set) {
    $set('title', 'Blog Post'); // Set the `title` field to `Blog Post`.
    //...
}
```

When this function is run, the state of the `title` field will be updated, and the schema will re-render with the new title.

By default, the `afterStateUpdated()` method of the field you set is not called when you use `$set()`. If you wish to call it, you can pass `shouldCallUpdatedHooks: true` as an argument:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Schemas\Components\Utilities\Set;

function (Set $set) {
    $set('title', 'Blog Post', shouldCallUpdatedHooks: true);
    //...
}
```

### Field dehydration

Dehydration is the process that gets data from the fields in your schemas, optionally transforms it, and returns it. It runs when you call the schema's `getState()` method, which is usually called when a form is submitted.

You may customize how the state is transformed when it is dehydrated using the `dehydrateStateUsing()` function. In this example, the `name` field will always be dehydrated with the correctly capitalized name:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;

TextInput::make('name')
    ->required()
    ->dehydrateStateUsing(fn (string $state): string => ucwords($state))
```

#### Preventing a field from being saved

You may prevent a field from being saved altogether using `saved(false)`. In this example, the field will not be present in the array returned from `getState()`, and any relationships associated with the field will not be saved either:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;

TextInput::make('password_confirmation')
    ->password()
    ->saved(false)
```

If your schema auto-saves data to the database, like in a [resource](../resources), this is useful to prevent a field from being saved to the database if it is purely used for presentational purposes.

<Info>
  Even when a field is not saved, it is still validated. To learn more about this behavior, see the [validation](./validation#disabling-validation-when-fields-are-not-saved) section.
</Info>

### Field rendering

Each time a reactive field is updated, the HTML of the entire Livewire component that the schema belongs to is re-generated and sent to the frontend via a network request. In some cases, this may be overkill, especially if the schema is large and only certain components have changed.

#### Field partial rendering

In this example, the value of the "name" input is used in the label of the "email" input. The "name" input is [`live()`](#the-basics-of-reactivity), so when the user types in the "name" input, the entire schema is re-rendered. This is not ideal, since only the "email" input needs to be re-rendered:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Get;

TextInput::make('name')
    ->live()
    
TextInput::make('email')
    ->label(fn (Get $get): string => filled($get('name')) ? "Email address for {$get('name')}" : 'Email address')
```

In this case, a simple call to `partiallyRenderComponentsAfterStateUpdated()`, passing the names of other fields to re-render, will make the schema re-render only the specified fields [after the state is updated](#field-updates):

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;

TextInput::make('name')
    ->live()
    ->partiallyRenderComponentsAfterStateUpdated(['email'])
```

Alternatively, you can instruct Filament to re-render the current component only, using `partiallyRenderAfterStateUpdated()`. This is useful if the reactive component is the only one that depends on its current state:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;

TextInput::make('name')
    ->live()
    ->partiallyRenderAfterStateUpdated()
    ->belowContent(fn (Get $get): ?string => filled($get('name')) ? "Hi, {$get('name')}!" : null)
```

#### Preventing the Livewire component from rendering after a field is updated

If you wish to prevent the Livewire component from re-rendering when a field is [updated](#field-updates), you can use the `skipRenderAfterStateUpdated()` method. This is useful if you want to perform some action when the field is updated, but you don't want the Livewire component to re-render:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;

TextInput::make('name')
    ->live()
    ->skipRenderAfterStateUpdated()
    ->afterStateUpdated(function (string $state) {
        // Do something with the state, but don't re-render the Livewire component.
    })
```

Since [setting the state of another field](#setting-the-state-of-another-field) from an `afterStateUpdated()` function using the `$set()` method will actually just mutate the frontend state of fields, you don't even need a network request in the first place. The `afterStateUpdatedJs()` method accepts a JavaScript expression that runs each time the value of the field changes. The [`$state`](#injecting-the-current-state-of-the-field), [`$get()`](#injecting-the-state-of-another-field) and [`$set()`](#setting-the-state-of-another-field) utilities are available in the JavaScript context, so you can use them to set the state of other fields:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Set;

// Old name input that is `live()`, so it makes a network request and render each time it is updated.
TextInput::make('name')
    ->live()
    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('email', ((string) str($state)->replace(' ', '.')->lower()) . '@example.com'))

// New name input that uses `afterStateUpdatedJs()` to set the state of the email field and doesn't make a network request.
TextInput::make('name')
    ->afterStateUpdatedJs(<<<'JS'
        $set('email', ($state ?? '').replaceAll(' ', '.').toLowerCase() + '@example.com')
        JS)
    
TextInput::make('email')
    ->label('Email address')
```

<Danger>
  Any JavaScript string passed to the `afterStateUpdatedJs()` method will be executed in the browser, so you should never add user input directly into the string, as it could lead to cross-site scripting (XSS) vulnerabilities. User input from `$state` or `$get()` should never be evaluated as JavaScript code, but is safe to use as a string value, like in the example above.
</Danger>

## Reactive forms cookbook

This section contains a collection of recipes for common tasks you may need to perform when building an advanced form.

### Conditionally hiding a field

To conditionally hide or show a field, you can pass a function to the `hidden()` method, and return `true` or `false` depending on whether you want the field to be hidden or not. The function can [inject utilities](#field-utility-injection) as parameters, so you can do things like check the value of another field:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Schemas\Components\Utilities\Get;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\TextInput;

Checkbox::make('is_company')
    ->live()

TextInput::make('company_name')
    ->hidden(fn (Get $get): bool => ! $get('is_company'))
```

In this example, the `is_company` checkbox is [`live()`](#the-basics-of-reactivity). This allows the schema to rerender when the value of the `is_company` field changes. You can access the value of that field from within the `hidden()` function using the [`$get()` utility](#injecting-the-state-of-another-field). The value of the field is inverted using `!` so that the `company_name` field is hidden when the `is_company` field is `false`.

Alternatively, you can use the `visible()` method to show a field conditionally. It does the exact inverse of `hidden()`, and could be used if you prefer the clarity of the code when written this way:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Schemas\Components\Utilities\Get;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\TextInput;

Checkbox::make('is_company')
    ->live()
    
TextInput::make('company_name')
    ->visible(fn (Get $get): bool => $get('is_company'))
```

<Tip>
  Using `live()` means the schema reloads every time the field changes, triggering a network request.
  Alternatively, you can use [JavaScript to hide the field based on another field's value](#hiding-a-field-using-javascript).
</Tip>

### Conditionally making a field required

To conditionally make a field required, you can pass a function to the `required()` method, and return `true` or `false` depending on whether you want the field to be required or not. The function can [inject utilities](#field-utility-injection) as parameters, so you can do things like check the value of another field:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Schemas\Components\Utilities\Get;
use Filament\Forms\Components\TextInput;

TextInput::make('company_name')
    ->live(onBlur: true)
    
TextInput::make('vat_number')
    ->required(fn (Get $get): bool => filled($get('company_name')))
```

In this example, the `company_name` field is [`live(onBlur: true)`](#reactive-fields-on-blur). This allows the schema to rerender after the value of the `company_name` field changes and the user clicks away. You can access the value of that field from within the `required()` function using the [`$get()` utility](#injecting-the-state-of-another-field). The value of the field is checked using `filled()` so that the `vat_number` field is required when the `company_name` field is not `null` or an empty string. The result is that the `vat_number` field is only required when the `company_name` field is filled in.

Using a function is able to make any other [validation rule](./validation) dynamic in a similar way.

### Generating a slug from a title

To generate a slug from a title while the user is typing, you can use the [`afterStateUpdated()` method](#field-updates) on the title field to [`$set()`](#setting-the-state-of-another-field) the value of the slug field:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Schemas\Components\Utilities\Set;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Str;

TextInput::make('title')
    ->live(onBlur: true)
    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state)))
    
TextInput::make('slug')
```

In this example, the `title` field is [`live(onBlur: true)`](#reactive-fields-on-blur). This allows the schema to rerender when the value of the `title` field changes and the user clicks away. The `afterStateUpdated()` method is used to run a function after the state of the `title` field is updated. The function injects the [`$set()` utility](#setting-the-state-of-another-field) and the new state of the `title` field. The `Str::slug()` utility method is part of Laravel and is used to generate a slug from a string. The `slug` field is then updated using the `$set()` function.

One thing to note is that the user may customize the slug manually, and we don't want to overwrite their changes if the title changes. To prevent this, we can use the old version of the title to work out if the user has modified it themselves. To access the old version of the title, you can inject `$old`, and to get the current value of the slug before it gets changed, we can use the [`$get()` utility](#injecting-the-state-of-another-field):

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Str;

TextInput::make('title')
    ->live(onBlur: true)
    ->afterStateUpdated(function (Get $get, Set $set, ?string $old, ?string $state) {
        if (($get('slug') ?? '') !== Str::slug($old)) {
            return;
        }
    
        $set('slug', Str::slug($state));
    })
    
TextInput::make('slug')
```

### Dependant select options

To dynamically update the options of a [select field](./select) based on the value of another field, you can pass a function to the `options()` method of the select field. The function can [inject utilities](#field-utility-injection) as parameters, so you can do things like check the value of another field using the [`$get()` utility](#injecting-the-state-of-another-field):

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Schemas\Components\Utilities\Get;
use Filament\Forms\Components\Select;

Select::make('category')
    ->options([
        'web' => 'Web development',
        'mobile' => 'Mobile development',
        'design' => 'Design',
    ])
    ->live()

Select::make('sub_category')
    ->options(fn (Get $get): array => match ($get('category')) {
        'web' => [
            'frontend_web' => 'Frontend development',
            'backend_web' => 'Backend development',
        ],
        'mobile' => [
            'ios_mobile' => 'iOS development',
            'android_mobile' => 'Android development',
        ],
        'design' => [
            'app_design' => 'Panel design',
            'marketing_website_design' => 'Marketing website design',
        ],
        default => [],
    })
```

In this example, the `category` field is [`live()`](#the-basics-of-reactivity). This allows the schema to rerender when the value of the `category` field changes. You can access the value of that field from within the `options()` function using the [`$get()` utility](#injecting-the-state-of-another-field). The value of the field is used to determine which options should be available in the `sub_category` field. The `match ()` statement in PHP is used to return an array of options based on the value of the `category` field. The result is that the `sub_category` field will only show options relevant to the selected `category` field.

You could adapt this example to use options loaded from an Eloquent model or other data source, by querying within the function:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Schemas\Components\Utilities\Get;
use Filament\Forms\Components\Select;
use Illuminate\Support\Collection;

Select::make('category')
    ->options(Category::query()->pluck('name', 'id'))
    ->live()
    
Select::make('sub_category')
    ->options(fn (Get $get): Collection => SubCategory::query()
        ->where('category', $get('category'))
        ->pluck('name', 'id'))
```

### Dynamic fields based on a select option

You may wish to render a different set of fields based on the value of a field, like a select. To do this, you can pass a function to the `schema()` method of any [layout component](../schemas/layouts), which checks the value of the field and returns a different schema based on that value. Also, you will need a way to initialise the new fields in the dynamic schema when they are first loaded.

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Utilities\Get;

Select::make('type')
    ->options([
        'employee' => 'Employee',
        'freelancer' => 'Freelancer',
    ])
    ->live()
    ->afterStateUpdated(fn (Select $component) => $component
        ->getContainer()
        ->getComponent('dynamicTypeFields')
        ->getChildSchema()
        ->fill())
    
Grid::make(2)
    ->schema(fn (Get $get): array => match ($get('type')) {
        'employee' => [
            TextInput::make('employee_number')
                ->required(),
            FileUpload::make('badge')
                ->image()
                ->required(),
        ],
        'freelancer' => [
            TextInput::make('hourly_rate')
                ->numeric()
                ->required()
                ->prefix('€'),
            FileUpload::make('contract')
                ->required(),
        ],
        default => [],
    })
    ->key('dynamicTypeFields')
```

In this example, the `type` field is [`live()`](#the-basics-of-reactivity). This allows the schema to rerender when the value of the `type` field changes. The `afterStateUpdated()` method is used to run a function after the state of the `type` field is updated. In this case, we [inject the current select field instance](#injecting-the-current-field-instance), which we can then use to get the schema "container" instance that holds both the select and the grid components. With this container, we can target the grid component using a unique key (`dynamicTypeFields`) that we have assigned to it. With that grid component instance, we can call `fill()`, just as we do on a normal form to initialise it. The `schema()` method of the grid component is then used to return a different schema based on the value of the `type` field. This is done by using the [`$get()` utility](#injecting-the-state-of-another-field), and returning a different schema array dynamically.

### Auto-hashing password field

You have a password field:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;

TextInput::make('password')
    ->password()
```

And you can use a [dehydration function](#field-dehydration) to hash the password when the form is submitted:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Facades\Hash;

TextInput::make('password')
    ->password()
    ->dehydrateStateUsing(fn (string $state): string => Hash::make($state))
```

But if your schema is used to change an existing password, you don't want to overwrite the existing password if the field is empty. You can [prevent the field from being saved](#preventing-a-field-from-being-saved) if the field is null or an empty string (using the `filled()` helper):

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Facades\Hash;

TextInput::make('password')
    ->password()
    ->dehydrateStateUsing(fn (string $state): string => Hash::make($state))
    ->saved(fn (?string $state): bool => filled($state))
```

However, you want to require the password to be filled when the user is being created, by [injecting the `$operation` utility](#injecting-the-current-operation), and then [conditionally making the field required](#conditionally-making-a-field-required):

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Facades\Hash;

TextInput::make('password')
    ->password()
    ->dehydrateStateUsing(fn (string $state): string => Hash::make($state))
    ->saved(fn (?string $state): bool => filled($state))
    ->required(fn (string $operation): bool => $operation === 'create')
```

<Info>
  In this example, `Hash::make($state)` shows how to use a [dehydration function](#field-dehydration). However, you don't need to do this if your Model uses `'password' => 'hashed'` in its [casts function — Laravel will handle hashing automatically](https://laravel.com/docs/eloquent-mutators#attribute-casting).
</Info>

## Saving data to relationships

As well as being able to give structure to fields, [layout components](../schemas/layouts) are also able to "teleport" their nested fields into a relationship. Filament will handle loading data from a `HasOne`, `BelongsTo` or `MorphOne` Eloquent relationship, and then it will save the data back to the same relationship. To set this behavior up, you can use the `relationship()` method on any layout component:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Fieldset;

Fieldset::make('Metadata')
    ->relationship('metadata')
    ->schema([
        TextInput::make('title'),
        Textarea::make('description'),
        FileUpload::make('image'),
    ])
```

In this example, the `title`, `description` and `image` are automatically loaded from the `metadata` relationship, and saved again when the form is submitted. If the `metadata` record does not exist, it is automatically created.

This functionality is not just limited to fieldsets - you can use it with any layout component. For example, you could use a `Group` component which has no styling associated with it:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Group;

Group::make()
    ->relationship('customer')
    ->schema([
        TextInput::make('name')
            ->label('Customer')
            ->required(),
        TextInput::make('email')
            ->label('Email address')
            ->email()
            ->required(),
    ])
```

### Saving data to a `BelongsTo` or `MorphTo` relationship

Please note that if you are saving the data to a `BelongsTo` or `MorphTo` relationship, then the foreign key column in your database must be `nullable()`. This is because Filament saves the schema first, before saving the relationship. Since the schema is saved first, the foreign ID does not exist yet, so it must be nullable. Immediately after the schema is saved, Filament saves the relationship, which will then fill in the foreign ID and save it again.

It is worth noting that if you have an observer on your schema model, then you may need to adapt it to ensure that it does not depend on the relationship existing when it is created. For example, if you have an observer that sends an email to a related record when a schema is created, you may need to switch to using a different hook that runs after the relationship is attached, like `updated()`.

#### Specifying the related model for a `MorphTo` relationship

If you are using a `MorphTo` relationship, and you want Filament to be able to create `MorphTo` records instead of just updating them, you need to specify the related model using the `relatedModel` parameter of the `relationship()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Models\Organization;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Group;

Group::make()
    ->relationship('customer', relatedModel: Organization::class)
    ->schema([
        // ...
    ])
```

In this example, `customer` is a `MorphTo` relationship, and could be an `Individual` or `Organization`. By specifying the `relatedModel` parameter, Filament will be able to create `Organization` records when the form is submitted. If you do not specify this parameter, Filament will only be able to update existing records.

<UtilityInjection set="formFields" version="5.x">The `relatedModel` parameter also accepts a function that returns the related model class name. This is useful if you want to dynamically determine the related model based on the current state of the form. You can inject various utilities into this function.</UtilityInjection>

### Conditionally saving data to a relationship

Sometimes, saving the related record may be optional. If the user fills out the customer fields, then the customer will be created / updated. Otherwise, the customer will not be created, or will be deleted if it already exists. To do this, you can pass a `condition` function as an argument to `relationship()`, which can use the `$state` of the related form to determine whether the relationship should be saved or not:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Group;

Group::make()
    ->relationship(
        'customer',
        condition: fn (?array $state): bool => filled($state['name']),
    )
    ->schema([
        TextInput::make('name')
            ->label('Customer'),
        TextInput::make('email')
            ->label('Email address')
            ->email()
            ->requiredWith('name'),
    ])
```

In this example, the customer's name is not `required()`, and the email address is only required when the `name` is filled. The `condition` function is used to check whether the `name` field is filled, and if it is, then the customer will be created / updated. Otherwise, the customer will not be created, or will be deleted if it already exists.

### Saving relationship data when the component is hidden

By default, if a layout component using `relationship()` is hidden when the form is submitted, Filament skips it entirely — the related record is not created or updated, and any existing record is left untouched. This is usually what you want, since hidden components have no state to save.

If you need Filament to save the relationship even when the component is hidden — for example, when its field values are populated by [defaults](#setting-the-default-value-of-a-field) — call `saveRelationshipsWhenHidden()`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Group;

Group::make()
    ->relationship('metadata')
    ->saveRelationshipsWhenHidden()
    ->hidden()
    ->schema([
        TextInput::make('source')
            ->default('admin'),
    ])
```

<Warning>
  Combining `saveRelationshipsWhenHidden()` with a `condition` that returns `false` while the component is hidden will cause any existing related record to be deleted when the form is submitted. If you only want to skip saving when the component is hidden, omit `saveRelationshipsWhenHidden()` and rely on the default behavior instead.
</Warning>

## Global settings

If you wish to change the default behavior of a field globally, then you can call the static `configureUsing()` method inside a service provider's `boot()` method or a middleware. Pass a closure which is able to modify the component. For example, if you wish to make all [checkboxes `inline(false)`](./checkbox#positioning-the-label-above), you can do it like so:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Checkbox;

Checkbox::configureUsing(function (Checkbox $checkbox): void {
    $checkbox->inline(false);
});
```

Of course, you are still able to overwrite this behavior on each field individually:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Checkbox;

Checkbox::make('is_admin')
    ->inline()
```

<EditOnGitHub version="5.x" path="packages/forms/docs/01-overview.md" />

<Footer />
