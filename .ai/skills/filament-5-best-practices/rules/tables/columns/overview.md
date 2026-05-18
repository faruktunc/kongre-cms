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

Column classes can be found in the `Filament\Tables\Columns` namespace. They reside within the `$table->columns()` method. Filament includes a number of columns built-in:

* [Text column](./text)
* [Icon column](./icon)
* [Image column](./image)
* [Color column](./color)

Editable columns allow the user to update data in the database without leaving the table:

* [Select column](./select)
* [Toggle column](./toggle)
* [Text input column](./text-input)
* [Checkbox column](./checkbox)

You may also [create your own custom columns](./custom-columns) to display data however you wish.

Columns may be created using the static `make()` method, passing its unique name. Usually, the name of a column corresponds to the name of an attribute on an Eloquent model. You may use "dot notation" to access attributes within relationships:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\TextColumn;

TextColumn::make('title')

TextColumn::make('author.name')
```

## Column content (state)

Columns may feel a bit magic at first, but they’re designed to be simple to use and optimized to display data from an Eloquent record. Despite this, they’re flexible and you can display data from any source, not just an Eloquent record attribute.

The data that a column displays is called its "state". When using a [panel resource](../../resources/overview), the table is aware of the records it is displaying. This means that the state of the column is set based on the value of the attribute on the record. For example, if the column is used in the table of a `PostResource`, then the `title` attribute value of the current post will be displayed.

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\TextColumn;

TextColumn::make('title')
```

If you want to access the value stored in a relationship, you can use "dot notation". The name of the relationship that you would like to access data from comes first, followed by a dot, and then the name of the attribute:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\TextColumn;

TextColumn::make('author.name')
```

You can also use "dot notation" to access values within a JSON / array column on an Eloquent model. The name of the attribute comes first, followed by a dot, and then the key of the JSON object you want to read from:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\TextColumn;

TextColumn::make('meta.title')
```

### Setting the state of a column

You can pass your own state to a column by using the `state()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\TextColumn;

TextColumn::make('title')
    ->state('Hello, world!')
```

<UtilityInjection set="tableColumns" except="$state" version="5.x">The `state()` method also accepts a function to dynamically calculate the state. You can inject various utilities into the function as parameters.</UtilityInjection>

### Setting the default state of a column

When a column is empty (its state is `null`), you can use the `default()` method to define alternative state to use instead. This method will treat the default state as if it were real, so columns like [image](./image) or [color](./color) will display the default image or color.

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\TextColumn;

TextColumn::make('title')
    ->default('Untitled')
```

#### Adding placeholder text if a column is empty

Sometimes you may want to display placeholder text for columns with an empty state, which is styled as a lighter gray text. This differs from the [default value](#setting-the-default-state-of-an-column), as the placeholder is always text and not treated as if it were real state.

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\TextColumn;

TextColumn::make('title')
    ->placeholder('Untitled')
```

<AutoScreenshot name="tables/columns/placeholder" alt="Column with a placeholder for empty state" version="5.x" />

### Displaying data from relationships

You may use "dot notation" to access columns within relationships. The name of the relationship comes first, followed by a period, followed by the name of the column to display:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\TextColumn;

TextColumn::make('author.name')
```

#### Counting relationships

If you wish to count the number of related records in a column, you may use the `counts()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\TextColumn;

TextColumn::make('users_count')->counts('users')
```

In this example, `users` is the name of the relationship to count from. The name of the column must be `users_count`, as this is the convention that [Laravel uses](https://laravel.com/docs/eloquent-relationships#counting-related-models) for storing the result.

If you'd like to scope the relationship before counting, you can pass an array to the method, where the key is the relationship name and the value is the function to scope the Eloquent query with:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;

TextColumn::make('users_count')->counts([
    'users' => fn (Builder $query) => $query->where('is_active', true),
])
```

#### Determining relationship existence

If you simply wish to indicate whether related records exist in a column, you may use the `exists()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\TextColumn;

TextColumn::make('users_exists')->exists('users')
```

In this example, `users` is the name of the relationship to check for existence. The name of the column must be `users_exists`, as this is the convention that [Laravel uses](https://laravel.com/docs/eloquent-relationships#other-aggregate-functions) for storing the result.

If you'd like to scope the relationship before checking existence, you can pass an array to the method, where the key is the relationship name and the value is the function to scope the Eloquent query with:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;

TextColumn::make('users_exists')->exists([
    'users' => fn (Builder $query) => $query->where('is_active', true),
])
```

#### Aggregating relationships

Filament provides several methods for aggregating a relationship field, including `avg()`, `max()`, `min()` and `sum()`. For instance, if you wish to show the average of a field on all related records in a column, you may use the `avg()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\TextColumn;

TextColumn::make('users_avg_age')->avg('users', 'age')
```

In this example, `users` is the name of the relationship, while `age` is the field that is being averaged. The name of the column must be `users_avg_age`, as this is the convention that [Laravel uses](https://laravel.com/docs/eloquent-relationships#other-aggregate-functions) for storing the result.

If you'd like to scope the relationship before aggregating, you can pass an array to the method, where the key is the relationship name and the value is the function to scope the Eloquent query with:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;

TextColumn::make('users_avg_age')->avg([
    'users' => fn (Builder $query) => $query->where('is_active', true),
], 'age')
```

## Setting a column's label

By default, the label of the column, which is displayed in the header of the table, is generated from the name of the column. You may customize this using the `label()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\TextColumn;

TextColumn::make('name')
    ->label('Full name')
```

<UtilityInjection set="tableColumns" except="$state" version="5.x">As well as allowing a static value, the `label()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

Customizing the label in this way is useful if you wish to use a [translation string for localization](https://laravel.com/docs/localization#retrieving-translation-strings):

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\TextColumn;

TextColumn::make('name')
    ->label(__('columns.name'))
```

## Sorting

Columns may be sortable, by clicking on the column label. To make a column sortable, you must use the `sortable()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\TextColumn;

TextColumn::make('name')
    ->sortable()
```

<AutoScreenshot name="tables/columns/sortable" alt="Table with sortable column" version="5.x" />

Using the name of the column, Filament will apply an `orderBy()` clause to the Eloquent query. This is useful for simple cases where the column name matches the database column name. It can also handle [relationships](#displaying-data-from-relationships).

However, many columns are not as simple. The [state](#column-content-state) of the column might be customized, or using an [Eloquent accessor](https://laravel.com/docs/eloquent-mutators#accessors-and-mutators). In this case, you may need to customize the sorting behavior.

You can pass an array of real database columns in the table to sort the column with:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\TextColumn;

TextColumn::make('full_name')
    ->sortable(['first_name', 'last_name'])
```

In this instance, the `full_name` column is not a real column in the database, but the `first_name` and `last_name` columns are. When the `full_name` column is sorted, Filament will sort the table by the `first_name` and `last_name` columns. The reason why two columns are passed is that if two records have the same `first_name`, the `last_name` will be used to sort them. If your use case doesn’t require this, you can pass only one column in the array if you wish.

You may also directly interact with the Eloquent query to customize how sorting is applied for that column:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;

TextColumn::make('full_name')
    ->sortable(query: function (Builder $query, string $direction): Builder {
        return $query
            ->orderBy('last_name', $direction)
            ->orderBy('first_name', $direction);
    })
```

<UtilityInjection set="tableColumns" except="$state" version="5.x" extras="Direction;;string;;$direction;;The direction that the column is currently being sorted on, either <code>'asc'</code> or <code>'desc'</code>.||Eloquent query builder;;Illuminate\Database\Eloquent\Builder;;$query;;The query builder to modify.">The `query` parameter's function can inject various utilities as parameters.</UtilityInjection>

### Sorting by default

You may choose to sort a table by default if no other sort is applied. You can use the `defaultSort()` method for this:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->columns([
            // ...
        ])
        ->defaultSort('stock', direction: 'desc');
}
```

The second parameter is optional and defaults to `'asc'`.

If you pass the name of a table column as the first parameter, Filament will use that column's sorting behavior (custom sorting columns or query function). However, if you need to sort by a column that doesn’t exist in the table or in the database, you should pass a query function instead:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

public function table(Table $table): Table
{
    return $table
        ->columns([
            // ...
        ])
        ->defaultSort(function (Builder $query): Builder {
            return $query->orderBy('stock');
        });
}
```

### Persisting the sort in the user's session

To persist the sorting in the user's session, use the `persistSortInSession()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->columns([
            // ...
        ])
        ->persistSortInSession();
}
```

### Setting a default sort option label

To set a default sort option label, use the `defaultSortOptionLabel()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->columns([
            // ...
        ])
        ->defaultSortOptionLabel('Date');
}
```

## Disabling default primary key sorting

By default, Filament will automatically add a primary key sort to the table query to ensure that the order of records is consistent. The primary key will be sorted in the same direction as the other sort column. If your table doesn't have a primary key, or you wish to disable this behavior, you can use the `defaultKeySort(false)` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->columns([
            // ...
        ])
        ->defaultKeySort(false);
}
```

## Searching

Columns may be searchable by using the text input field in the top right of the table. To make a column searchable, you must use the `searchable()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\TextColumn;

TextColumn::make('name')
    ->searchable()
```

<AutoScreenshot name="tables/columns/searchable" alt="Table with searchable column" version="5.x" />

By default, Filament will apply a `where` clause to the Eloquent query, searching for the column name. This is useful for simple cases where the column name matches the database column name. It can also handle [relationships](#displaying-data-from-relationships).

However, many columns are not as simple. The [state](#column-content-state) of the column might be customized, or using an [Eloquent accessor](https://laravel.com/docs/eloquent-mutators#accessors-and-mutators). In this case, you may need to customize the search behavior.

You can pass an array of real database columns in the table to search the column with:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\TextColumn;

TextColumn::make('full_name')
    ->searchable(['first_name', 'last_name'])
```

In this instance, the `full_name` column is not a real column in the database, but the `first_name` and `last_name` columns are. When the `full_name` column is searched, Filament will search the table by the `first_name` and `last_name` columns.

You may also directly interact with the Eloquent query to customize how searching is applied for that column:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;

TextColumn::make('full_name')
    ->searchable(query: function (Builder $query, string $search): Builder {
        return $query
            ->where('first_name', 'like', "%{$search}%")
            ->orWhere('last_name', 'like', "%{$search}%");
    })
```

<UtilityInjection set="tableColumns" except="$state" version="5.x" extras="Search;;string;;$search;;The current search input value.||Eloquent query builder;;Illuminate\Database\Eloquent\Builder;;$query;;The query builder to modify.">The `query` parameter's function can inject various utilities as parameters.</UtilityInjection>

### Adding extra searchable columns to the table

You may allow the table to search with extra columns that aren’t present in the table by passing an array of column names to the `searchable()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->columns([
            // ...
        ])
        ->searchable(['id']);
}
```

You may use dot notation to search within relationships:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->columns([
            // ...
        ])
        ->searchable(['id', 'author.id']);
}
```

You may also pass custom functions to search using:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->columns([
            // ...
        ])
        ->searchable([
            'id',
            'author.id',
            function (Builder $query, string $search): Builder {
                if (! is_numeric($search)) {
                    return $query;
                }

                return $query->whereYear('published_at', $search);
            },
        ]);
}
```

### Customizing the table search field placeholder

You may customize the placeholder in the search field using the `searchPlaceholder()` method on the `$table`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Table;

public static function table(Table $table): Table
{
    return $table
        ->columns([
            // ...
        ])
        ->searchPlaceholder('Search (ID, Name)');
}
```

### Searching individually

You can choose to enable a per-column search input field using the `isIndividual` parameter:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\TextColumn;

TextColumn::make('name')
    ->searchable(isIndividual: true)
```

<AutoScreenshot name="tables/columns/individually-searchable" alt="Table with individually searchable column" version="5.x" />

If you use the `isIndividual` parameter, you may still search that column using the main "global" search input field for the entire table.

To disable that functionality while still preserving the individual search functionality, you need the `isGlobal` parameter:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\TextColumn;

TextColumn::make('title')
    ->searchable(isIndividual: true, isGlobal: false)
```

### Customizing the table search debounce

You may customize the debounce time in all table search fields using the `searchDebounce()` method on the `$table`. By default, it is set to `500ms`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Table;

public static function table(Table $table): Table
{
    return $table
        ->columns([
            // ...
        ])
        ->searchDebounce('750ms');
}
```

### Searching when the input is blurred

Instead of automatically reloading the table contents while the user is typing their search, which is affected by the [debounce](#customizing-the-table-search-debounce) of the search field, you may change the behavior so that the table is only searched when the user blurs the input (tabs or clicks out of it), using the `searchOnBlur()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Table;

public static function table(Table $table): Table
{
    return $table
        ->columns([
            // ...
        ])
        ->searchOnBlur();
}
```

### Persisting the search in the user's session

To persist the table or individual column search in the user's session, use the `persistSearchInSession()` or `persistColumnSearchInSession()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->columns([
            // ...
        ])
        ->persistSearchInSession()
        ->persistColumnSearchesInSession();
}
```

### Disabling search term splitting

By default, the table search will split the search term into individual words and search for each word separately. This allows for more flexible search queries. However, it can have a negative impact on performance when large datasets are involved. You can disable this behavior using the `splitSearchTerms(false)` method on the table:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->columns([
            // ...
        ])
        ->splitSearchTerms(false);
}
```

## Clickable cell content

When a cell is clicked, you may open a URL or trigger an "action".

### Opening URLs

To open a URL, you may use the `url()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\TextColumn;

TextColumn::make('title')
    ->url(fn (Post $record): string => route('posts.edit', ['post' => $record]))
```

<UtilityInjection set="tableColumns" version="5.x">The `url()` method also accepts a function to dynamically calculate the value. You can inject various utilities into the function as parameters.</UtilityInjection>

<Tip>
  You can also pick a URL for the entire row to open, not just a singular column. Please see the [Record URLs section](../overview#record-urls-clickable-rows).

  When using a record URL and a column URL, the column URL will override the record URL for those cells only.
</Tip>

You may also choose to open the URL in a new tab:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\TextColumn;

TextColumn::make('title')
    ->url(fn (Post $record): string => route('posts.edit', ['post' => $record]))
    ->openUrlInNewTab()
```

<Danger>
  If you are passing user-controlled data to the `url()` method, you should validate that the URL does not use a dangerous scheme such as `javascript:` or `data:`. Failing to do so could expose your application to XSS attacks.
</Danger>

### Triggering actions

To run a function when a cell is clicked, you may use the `action()` method. Each method accepts a `$record` parameter which you may use to customize the behavior of the action:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\TextColumn;

TextColumn::make('title')
    ->action(function (Post $record): void {
        $this->dispatch('open-post-edit-modal', post: $record->getKey());
    })
```

#### Action modals

You may open [action modals](../../actions#modals) by passing in an `Action` object to the `action()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;
use Filament\Tables\Columns\TextColumn;

TextColumn::make('title')
    ->action(
        Action::make('select')
            ->requiresConfirmation()
            ->action(function (Post $record): void {
                $this->dispatch('select-post', post: $record->getKey());
            }),
    )
```

Action objects passed into the `action()` method must have a unique name to distinguish it from other actions within the table.

#### Preventing cells from being clicked

You may prevent a cell from being clicked by using the `disabledClick()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\TextColumn;

TextColumn::make('title')
    ->disabledClick()
```

If [row URLs](../overview#record-urls-clickable-rows) are enabled, the cell will not be clickable.

## Adding a tooltip to a column

You may specify a tooltip to display when you hover over a cell:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\TextColumn;

TextColumn::make('title')
    ->tooltip('Title')
```

<UtilityInjection set="tableColumns" version="5.x">As well as allowing a static value, the `tooltip()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

<AutoScreenshot name="tables/columns/tooltips" alt="Table with column triggering a tooltip" version="5.x" />

## Adding a header tooltip to a column

You may specify a tooltip to display when you hover over the column header:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\TextColumn;

TextColumn::make('sku')
    ->headerTooltip('Stock Keeping Unit')
```

<UtilityInjection set="tableColumns" version="5.x">As well as allowing a static value, the `headerTooltip()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

<AutoScreenshot name="tables/columns/header-tooltips" alt="Table with header tooltip on a column" version="5.x" />

## Aligning column content

### Horizontally aligning column content

You may align the content of an column to the start (left in left-to-right interfaces, right in right-to-left interfaces), center, or end (right in left-to-right interfaces, left in right-to-left interfaces) using the `alignStart()`, `alignCenter()` or `alignEnd()` methods:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\TextColumn;

TextColumn::make('email')
    ->alignStart() // This is the default alignment.

TextColumn::make('email')
    ->alignCenter()

TextColumn::make('email')
    ->alignEnd()
```

Alternatively, you may pass an `Alignment` enum to the `alignment()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Support\Enums\Alignment;
use Filament\Tables\Columns\TextColumn;

TextColumn::make('email')
    ->label('Email address')
    ->alignment(Alignment::End)
```

<UtilityInjection set="tableColumns" version="5.x">As well as allowing a static value, the `alignment()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

<AutoScreenshot name="tables/columns/alignment" alt="Table with column aligned to the end" version="5.x" />

### Vertically aligning column content

You may align the content of a column to the start, center, or end using the `verticallyAlignStart()`, `verticallyAlignCenter()` or `verticallyAlignEnd()` methods:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\TextColumn;

TextColumn::make('name')
    ->verticallyAlignStart()

TextColumn::make('name')
    ->verticallyAlignCenter() // This is the default alignment.

TextColumn::make('name')
    ->verticallyAlignEnd()
```

Alternatively, you may pass a `VerticalAlignment` enum to the `verticalAlignment()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Support\Enums\VerticalAlignment;
use Filament\Tables\Columns\TextColumn;

TextColumn::make('name')
    ->verticalAlignment(VerticalAlignment::Start)
```

<UtilityInjection set="tableColumns" version="5.x">As well as allowing a static value, the `verticalAlignment()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

<AutoScreenshot name="tables/columns/vertical-alignment" alt="Table with column vertically aligned to the start" version="5.x" />

## Allowing column headers to wrap

By default, column headers will not wrap onto multiple lines if they need more space. You may allow them to wrap using the `wrapHeader()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\TextColumn;

TextColumn::make('name')
    ->wrapHeader()
```

Optionally, you may pass a boolean value to control if the header should wrap:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\TextColumn;

TextColumn::make('name')
    ->wrapHeader(FeatureFlag::active())
```

<UtilityInjection set="tableColumns" version="5.x">The `wrapHeader()` method also accepts a function to dynamically calculate the value. You can inject various utilities into the function as parameters.</UtilityInjection>

<AutoScreenshot name="tables/columns/wrap-header" alt="Table with wrapped column headers" version="5.x" />

## Controlling the width of columns

By default, columns will take up as much space as they need. You may allow some columns to consume more space than others by using the `grow()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\TextColumn;

TextColumn::make('name')
    ->grow()
```

Alternatively, you can define a width for the column, which is passed to the header cell using the `style` attribute, so you can use any valid CSS value:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\IconColumn;

IconColumn::make('is_paid')
    ->label('Paid')
    ->boolean()
    ->width('1%')
```

<UtilityInjection set="tableColumns" except="$state" version="5.x">The `width()` method also accepts a function to dynamically calculate the value. You can inject various utilities into the function as parameters.</UtilityInjection>

<AutoScreenshot name="tables/columns/width" alt="Table with column width controls" version="5.x" />

## Grouping columns

You group multiple columns together underneath a single heading using a `ColumnGroup` object:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\ColumnGroup;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->columns([
            TextColumn::make('title'),
            TextColumn::make('slug'),
            ColumnGroup::make('Visibility', [
                TextColumn::make('status'),
                IconColumn::make('is_featured'),
            ]),
            TextColumn::make('author.name'),
        ]);
}
```

The first argument is the label of the group, and the second is an array of column objects that belong to that group.

<AutoScreenshot name="tables/columns/grouping" alt="Table with grouped columns" version="5.x" />

You can also control the group header [alignment](#horizontally-aligning-column-content) and [wrapping](#allowing-column-headers-to-wrap) on the `ColumnGroup` object. To improve the multi-line fluency of the API, you can chain the `columns()` onto the object instead of passing it as the second argument:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Support\Enums\Alignment;
use Filament\Tables\Columns\ColumnGroup;

ColumnGroup::make('Website visibility')
    ->columns([
        // ...
    ])
    ->alignCenter()
    ->wrapHeader()
```

## Hiding columns

You may hide a column by using the `hidden()` or `visible()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\TextColumn;

TextColumn::make('email')
    ->hidden()

TextColumn::make('email')
    ->visible()
```

To hide a column conditionally, you may pass a boolean value to either method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\TextColumn;

TextColumn::make('role')
    ->hidden(FeatureFlag::active())

TextColumn::make('role')
    ->visible(FeatureFlag::active())
```

### Allowing users to manage columns

#### Toggling column visibility

Users may hide or show columns themselves in the table. To make a column toggleable, use the `toggleable()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\TextColumn;

TextColumn::make('email')
    ->toggleable()
```

<AutoScreenshot name="tables/columns/column-manager" alt="Table with column manager" version="5.x" />

##### Making toggleable columns hidden by default

By default, toggleable columns are visible. To make them hidden instead:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\TextColumn;

TextColumn::make('id')
    ->toggleable(isToggledHiddenByDefault: true)
```

#### Reordering columns

You may allow columns to be reordered in the table using the `reorderableColumns()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->columns([
            // ...
        ])
        ->reorderableColumns();
}
```

<AutoScreenshot name="tables/columns/column-manager-reorderable" alt="Table with reorderable column manager" version="5.x" />

#### Live column manager

By default, column manager changes (toggling and reordering columns) are deferred and do not affect the table, until the user clicks an "Apply" button. To disable this and make the filters "live" instead, use the `deferColumnManager(false)` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->columns([
            // ...
        ])
        ->reorderableColumns()
        ->deferColumnManager(false);
}
```

#### Displaying the column manager in a modal

To render the column manager in a modal instead of in a dropdown, you may use the `columnManagerLayout()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Enums\ColumnManagerLayout;
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->columns([
            // ...
        ])
        ->columnManagerLayout(ColumnManagerLayout::Modal);
}
```

<AutoScreenshot name="tables/columns/column-manager-modal" alt="Table with column manager in a modal" version="5.x" />

You may use the [trigger action API](#customizing-the-column-manager-trigger-action) to [customize the modal](../../actions/modals), including [using a `slideOver()`](../../actions/modals#using-a-slide-over-instead-of-a-modal).

#### Customizing the column manager trigger action

To customize the column manager trigger button, you may use the `columnManagerTriggerAction()` method, passing a closure that returns an action. All methods that are available to [customize action trigger buttons](../../actions/overview) can be used:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->columns([
            // ...
        ])
        ->columnManagerTriggerAction(
            fn (Action $action) => $action
                ->button()
                ->label('Column Manager'),
        );
}
```

#### Displaying the reset action in the footer

By default, the reset action appears in the header of the column manager. You may move it to the footer, next to the apply action, using the `columnManagerResetActionPosition()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Enums\ColumnManagerResetActionPosition;
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->columns([
            // ...
        ])
        ->columnManagerResetActionPosition(ColumnManagerResetActionPosition::Footer);
}
```

#### Disabling column persistence in the user's session

By default, Filament persists the table's columns by storing them in the user's session. To prevent persisting the columns in the user's session, use the `persistColumnsInSession(false)` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->columns([
            // ...
        ])
        ->persistColumnsInSession(false);
}
```

#### Changing the number of display columns in the column manager

By default, the column manager displays its options in a single column. You can increase this to multiple columns using the `columnManagerColumns()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->columns([
            // ...
        ])
        ->columnManagerColumns(2);
}
```

<AutoScreenshot name="tables/columns/column-manager-columns" alt="Table with a 2-column column manager" version="5.x" />

## Adding extra HTML attributes to a column content

You can pass extra HTML attributes to the column content via the `extraAttributes()` method, which will be merged onto its outer HTML element. The attributes should be represented by an array, where the key is the attribute name and the value is the attribute value:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\TextColumn;

TextColumn::make('slug')
    ->extraAttributes(['class' => 'slug-column'])
```

<UtilityInjection set="tableColumns" version="5.x">As well as allowing a static value, the `extraAttributes()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

By default, calling `extraAttributes()` multiple times will overwrite the previous attributes. If you wish to merge the attributes instead, you can pass `merge: true` to the method.

### Adding extra HTML attributes to the cell

You can also pass extra HTML attributes to the table cell which surrounds the content of the column:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\TextColumn;

TextColumn::make('slug')
    ->extraCellAttributes(['class' => 'slug-cell'])
```

<UtilityInjection set="tableColumns" version="5.x">As well as allowing a static value, the `extraCellAttributes()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

By default, calling `extraCellAttributes()` multiple times will overwrite the previous attributes. If you wish to merge the attributes instead, you can pass `merge: true` to the method.

### Adding extra attributes to the header cell

You can pass extra HTML attributes to the table header cell which surrounds the content of the column:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\TextColumn;

TextColumn::make('slug')
    ->extraHeaderAttributes(['class' => 'slug-header-cell'])
```

<UtilityInjection set="tableColumns" version="5.x">As well as allowing a static value, the `extraHeaderAttributes()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

By default, calling `extraHeaderAttributes()` multiple times will overwrite the previous attributes. If you wish to merge the attributes instead, you can pass `merge: true` to the method.

## Column utility injection

The vast majority of methods used to configure columns accept functions as parameters instead of hardcoded values:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Models\User;
use Filament\Tables\Columns\TextColumn;

TextColumn::make('email')
    ->placeholder(fn (User $record): string => "No email for {$record->name}")

TextColumn::make('role')
    ->badge(fn (User $record): bool => $record->role === 'admin')

TextColumn::make('name')
    ->extraAttributes(fn (User $record): array => ['class' => "{$record->getKey()}-name-column"])
```

This alone unlocks many customization possibilities.

The package is also able to inject many utilities to use inside these functions, as parameters. All customization methods that accept functions as arguments can inject utilities.

These injected utilities require specific parameter names to be used. Otherwise, Filament doesn't know what to inject.

### Injecting the current state of the column

If you wish to access the current [value (state)](#column-content-state) of the column, define a `$state` parameter:

```php theme={"theme":"gruvbox-dark-hard"}
function ($state) {
    // ...
}
```

### Injecting the current Eloquent record

You may retrieve the Eloquent record for the current schema using a `$record` parameter:

```php theme={"theme":"gruvbox-dark-hard"}
use Illuminate\Database\Eloquent\Model;

function (?Model $record) {
    // ...
}
```

### Injecting the row loop

To access the [row loop](https://laravel.com/docs/blade#the-loop-variable) object for the current table row, define a `$rowLoop` parameter:

```php theme={"theme":"gruvbox-dark-hard"}
function (stdClass $rowLoop) {
    // ...
}
```

### Injecting the current Livewire component instance

If you wish to access the current Livewire component instance, define a `$livewire` parameter:

```php theme={"theme":"gruvbox-dark-hard"}
use Livewire\Component;

function (Component $livewire) {
    // ...
}
```

### Injecting the current column instance

If you wish to access the current component instance, define a `$component` parameter:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\Column;

function (Column $component) {
    // ...
}
```

### Injecting the current table instance

If you wish to access the current table instance, define a `$table` parameter:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Table;

function (Table $table) {
    // ...
}
```

### Injecting multiple utilities

The parameters are injected dynamically using reflection, so you’re able to combine multiple parameters in any order:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Models\User;
use Livewire\Component as Livewire;

function (Livewire $livewire, mixed $state, User $record) {
    // ...
}
```

### Injecting dependencies from Laravel's container

You may inject anything from Laravel's container like normal, alongside utilities:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Models\User;
use Illuminate\Http\Request;

function (Request $request, User $record) {
    // ...
}
```

## Global settings

If you wish to change the default behavior of all columns globally, then you can call the static `configureUsing()` method inside a service provider's `boot()` method, to which you pass a Closure to modify the columns using. For example, if you wish to make all `TextColumn` columns [`toggleable()`](#toggling-column-visibility), you can do it like so:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\TextColumn;

TextColumn::configureUsing(function (TextColumn $column): void {
    $column->toggleable();
});
```

Of course, you’re still able to overwrite this on each column individually:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\TextColumn;

TextColumn::make('name')
    ->toggleable(false)
```

<EditOnGitHub version="5.x" path="packages/tables/docs/02-columns/01-overview.md" />

<Footer />
